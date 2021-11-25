<?php

declare(strict_types = 1);

namespace App\Controllers;

use App\App;
use App\Models\Transaction;
use App\View;

class HomeController
{
    public function index(): View
    {
        return View::make('index');
    }

    public function upload(): View
    {
        // get csv file
        if (array_key_exists('transaction', $_FILES)) {
            // check file exists
            $fileList = $_FILES['transaction'];

            // upload file
            foreach ($fileList['name'] as $key => $rowFile) {
                $fileInfo = pathinfo($rowFile);
                $extension = $fileInfo['extension'];
                $baseName = $fileInfo['basename'];

                if (!in_array($extension, ['csv'])) {
                    continue;
                }

                $fileList['to_path'][$key] = STORAGE_PATH."/".$baseName;

                $result = move_uploaded_file($fileList['tmp_name'][$key], $fileList['to_path'][$key]);

                if ($result) {
                    echo $baseName.' upload successfully!'.PHP_EOL."<br/>";
                }
            }
        }
        $action = $_GET['action'];

        if ($action == 'process') {
            $files = scandir(STORAGE_PATH.'/');

            foreach ($files as $rowFile) {
                if (in_array($rowFile, [".", ".."])) {
                    continue;
                }
                $filePath = STORAGE_PATH.'/'.$rowFile;
                $fileInfo = pathinfo($filePath);
                $extension = $fileInfo['extension'];
                if (!in_array($extension, ['csv'])) {
                    continue;
                }

                // csv
                $cleanData = [];
                if ($extension == 'csv' && ($handle = fopen($filePath, 'r')) !== FALSE) {
                    fgetcsv($handle);
                    while (($data = fgetcsv($handle)) !== FALSE) {

                        $cleanData[] = [
                            strtotime($data[0]),
                             $data[1] ? (string) $data[1] : NULL,
                            $data[2],
                            (float) str_replace(['$', ','], '', $data[3])
                        ];
                    }
                }

                // write to transaction table
                $db = App::db();
                $db->beginTransaction();
                foreach ($cleanData as $rowData) {
                    [$date,  $checkNumber, $description, $amount] = $rowData;
                    $transactionModel = new Transaction();
                    $transactionModel->create((string) $date, (string) $checkNumber, $description, (float) $amount);
                }
                $db->commit();
            }
            echo 'process done';
        }

        // write to transaction table
        return View::make('upload_form');
    }

    public function details(): View
    {
        $transactionModel = new Transaction();

        $data = $transactionModel->findAll();
        $totals = [
            'income' => 0,
            'expense' => 0,
            'net' => 0,
        ];

        foreach ($data as $rowData) {
            if ($rowData['amount'] > 0) {
                $totals['income'] += $rowData['amount'];
            } else {
                $totals['expense'] += $rowData['amount'];
            }

            $totals['net'] += $rowData['amount'];
        }

        return View::make('transactions', [
            'transactions' => $data,
            'totals' => $totals
        ]);
    }
}

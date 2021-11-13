<?php

declare(strict_types = 1);

// Your Code

// read all files from transaction_files
function getTransactionFiles(string $dir): array {

    // get transaction files
    $files = [];
    foreach(scandir($dir) as $path) {
        if (is_dir($path)) {
            continue;
        }
        array_push($files, $dir.$path);
    }

    return $files;
}

function getTransaction(string $fileDir, ?callable $transactionHandler = null) {

    // read transaction data
    if (!file_exists($fileDir)) {
        trigger_error("File not exists!", E_USER_WARNING);
    }

    $result = [];

    $handle = fopen($fileDir, "r");
    // discard first record
    fgetcsv($handle);

    while (($line = fgetcsv($handle)) !== false) {
        if ($transactionHandler != null) {
            $transaction = $transactionHandler($line);
        }
        array_push($result, $transaction);
    }

    return $result;
}

function extractTransaction($transaction) {
    [$date, $check, $name, $amount] = $transaction;
    
    $amount = (float) str_replace(["$", ","], "", $amount);
    
    return [
        'date' => $date,
        'check' => $check,
        'name' => $name,
        'amount' => $amount
    ];
}

function calcualateTotals($transactions) {
    $totals = ['totalIncome' => 0, 'totalExpense' => 0, 'totalNet' => 0];

    foreach ($transactions as $transaction) {
        if ($transaction['amount'] > 0) {
            $totals['totalIncome'] += $transaction['amount'];
        } else {
            $totals['totalExpense'] += $transaction['amount'];
        }

        $totals['totalNet'] += $transaction['amount'];
    }

    return $totals;
}
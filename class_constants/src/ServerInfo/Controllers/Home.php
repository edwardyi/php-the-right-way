<?php

declare(strict_types=1);

namespace App\ServerInfo\Controllers;

use App\ServerInfo\App;
use App\ServerInfo\Container;
use App\ServerInfo\Models\SignUp;
use App\ServerInfo\Models\User;
use App\ServerInfo\Models\Invoice;
use App\ServerInfo\Services\InvoiceService;
use App\ServerInfo\View;
use Exception;
use PDO;
use PDOException;
use Throwable;

class Home
{

    public function __construct(private InvoiceService $invoiceService)
    {
    }

    public function testDI()
    {
        // method 3
        $result = $this->invoiceService->process([], 45);

        // method 2
        // $result = (new Container())->get(InvoiceService::class)->process([], 35);

        // method 1
        // $result = App::$container->get(InvoiceService::class)->process([], 24);

        // var_dump($result);
        // echo 'ttt';

        exit;
    }

    public function testInsertByModel()
    {
        // $db1 = App::db();
        // $db2 = App::db();
        // $db3 = App::db();

        // var_dump($db1==$db2, $db2==$db3);

        $email = 'testInsertHelloModel7@doe.com';
        $name = 'InsertTestModel';
        // $active = 1;
        // $date = date("Y-m-d H:i:s", strtotime("11/3/2021 10:00PM"));
        $amount = 100;

        $userModel = new User();
        $invoiceModel = new Invoice();

        $invoiceId = (new SignUp($userModel, $invoiceModel))->register(
            [
                'email' => $email,
                'name' =>  $name
            ],
            [
                'amount' => $amount
            ]
        );

        return View::make("Invoice/test_model", ['invoice' => $invoiceModel->find($invoiceId)]);
    }

    public function testInsertTransaction()
    {
        try {
            // var_dump($host, $dbName, $user, $password);
            $db = new PDO("mysql:host=".$_ENV['DB_HOST'].";dbname=".$_ENV['DB_NAME']."", 
                $_ENV['DB_USERNAME'], 
                $_ENV['DB_PASSWORD'], [
                PDO::ATTR_EMULATE_PREPARES => false
            ]);

        } catch (PDOException $e) {
            throw new PDOException($e->getMessage(), (int) $e->getCode());
        }
        try {
            $db->beginTransaction();

            $email = 'testInsert9@doe.com';
            $name = 'InsertTest';
            // $active = 1;
            // $date = date("Y-m-d H:i:s", strtotime("11/3/2021 10:00PM"));
            $amount = 100;

            $newUserStmt = $db->prepare("INSERT INTO Users(email, full_name, is_active, created_at) 
                VALUES(?, ?, 1, now())");

            $newUserStmt->execute([$email, $name]);

            $userId = (int) $db->lastInsertId();
            // var_dump($userId);
            // throw new Exception("testing transactino exception!");

            $newAccountSmt = $db->prepare("INSERT INTO invoices(amount, user_id)
                VALUES(?, ?)");

            $newAccountSmt->execute([$amount, $userId]);
            $db->commit();

            $queryStmt = $db->prepare("SELECT 
                invoices.id AS invoice_id, 
                amount, 
                full_name,
                email
            FROM invoices INNER JOIN Users ON invoices.user_id = Users.id
            WHERE email = ?");

            $queryStmt->execute([$email]);

            echo "<pre>";
            var_dump($queryStmt->fetch());
            echo "</pre>";

            // echo "<pre>";
            // var_dump($db->query("SELECT * FROM Users WHERE id=".$userId)->fetch(PDO::FETCH_ASSOC));

            // var_dump($db->query("SELECT * FROM invoices WHERE user_id=".$userId)->fetch(PDO::FETCH_ASSOC));
            // echo "</pre>";

            var_dump($db);

        } catch (Throwable $e) {
            if ($db->inTransaction()) {
                var_dump('in transaction:', $e->getMessage());
                $db->rollback();
            }
        }


    }

    public function index()
    {
        // echo phpinfo();
        // exit;
        // $_SESSION['count']++ ??  1 ;
        $_SESSION['count'] = ($_SESSION['count'] ?? 0) + 1;

        try {
            $db = new PDO("mysql:host=db;dbname=my_db", "root", "root", [
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
            ]);
            $email = $_GET['email'];

            // http://{your-host}/server_info.php/home/index?email=foo@bar.com%27+OR+1=1--%27
            $query = "SELECT * FROM Users WHERE email = '".$email."'";

            echo $query;

            foreach($db->query($query)->fetchAll(PDO::FETCH_ASSOC) as $user) {
                echo '<pre>';
                var_dump($user);
                echo '</pre>';
            }
            var_dump($db);

            // use prepare statement
            $query = "SELECT * FROM Users WHERE email = :email";

            $stmt = $db->prepare($query);

            $stmt->bindValue('email', $email);

            $stmt->execute();

            var_dump('total user:', count($stmt->fetchAll()));

            foreach($stmt->fetchAll() as $user) {
                echo '<pre>';
                var_dump($user);
                echo '</pre>';
            }

            $email = 'test@doe.com';
            $fullName = 'tts';
            $active = 1;
            $createdAt = date("Y-m-d H:i:s", strtotime("08/11/2021 10:00PM"));

            $insertSQL = "INSERT INTO Users(email, full_name, is_active, created_at) 
                VALUES (:email, :fullName, :active, :date)";

            $stmt = $db->prepare($insertSQL);
            $stmt->bindParam("email", $email);
            $stmt->bindValue("fullName", $fullName);
            $stmt->bindValue(":active", $active);
            $stmt->bindValue("date", $createdAt);

            $email = "tts@deo.com";

            $result = $stmt->execute();

            $id = $db->lastInsertId();

            // get inserted user data
            $user = $db->query("SELECT * FROM Users WHERE id=".$id)->fetch();
            echo "<pre>";
            var_dump($user);
            echo "</pre>";

            var_dump($result);
        } catch (PDOException $e) {
            // var_dump($e);
            // replace message try not to expose password
            throw new PDOException($e->getMessage(), (int) $e->getCode());
        }

        return 'index';
    }

    public function welcome()
    {
        // return (new View('/Home/welcome'))->render();
        return View::make('/Home/welcome')->render();
    }

    public function test()
    {
        $data = ['demo' => '123 passing from controller'];
        // var_dump(View::make('/Home/test', $data));
        // var_dump(array_merge($data, $_GET));

        return View::make("/Home/test", array_merge($data, $_GET));
    }
}
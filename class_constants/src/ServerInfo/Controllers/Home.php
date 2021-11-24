<?php

declare(strict_types=1);

namespace App\ServerInfo\Controllers;

use App\ServerInfo\View;
use PDO;
use PDOException;

class Home
{
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
            throw new PDOException($e->getMessage(), $e->getCode());
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
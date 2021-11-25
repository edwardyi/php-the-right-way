<?php

namespace App\Models;

use App\Model;

class Transaction extends Model
{
    public function create(string $date, ?string $checkNumber, string $description, float $amount) 
    {
        $stmt = $this->db->prepare("INSERT INTO transactions (date, check_number, description, amount) 
            VALUES (:date, :checkNumber, :description, :amount) ");

        // echo "INSERT INTO transactions (date, check_number, description, amount) VALUES (:date, :checkNumber, :description, :amount)";

        $stmt->bindValue('date', date("Y-m-d H:i:s", $date));
        $stmt->bindValue('checkNumber', $checkNumber);
        $stmt->bindValue('description', $description);
        $stmt->bindValue('amount', $amount);

        $stmt->execute();
    }

    public function findAll(): array
    {
        $stmt = $this->db->prepare("SELECT * FROM transactions");
        $stmt->execute();

        return $stmt->fetchAll() ?? [];
    }
}
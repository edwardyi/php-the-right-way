<?php

declare(strict_types = 1);

namespace App\ServerInfo\Models;

class Invoice extends Model
{
    public function create(int $amount, int $userId): int
    {
        $stmt = $this->db->prepare("INSERT INTO invoices(amount, user_id)
        VALUES(?, ?)");

        $stmt->execute([$amount, $userId]);

        return (int) $this->db->lastInsertId();
    }

    public function find(int $invoiceId): array
    {
        $stmt = $this->db->prepare("SELECT invoices.id AS invoice_id, amount, full_name 
            FROM invoices 
            INNER JOIN Users 
            ON invoices.user_id = Users.id 
            WHERE invoices.id = ?"
        );

        $stmt->execute([$invoiceId]);

        $invoice = $stmt->fetch();

        return $invoice ? $invoice : [];
    }
}
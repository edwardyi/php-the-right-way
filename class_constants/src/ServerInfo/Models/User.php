<?php

declare(strict_types = 1);

namespace App\ServerInfo\Models;

class User extends Model
{
    public function create(string $email, string $name, bool $isActive = true): int
    {
        $stmt = $this->db->prepare("INSERT INTO Users(email, full_name, is_active, created_at) 
        VALUES(?, ?, ?, now())");

        $stmt->execute([$email, $name, $isActive]);

        return (int) $this->db->lastInsertId();
    }
}
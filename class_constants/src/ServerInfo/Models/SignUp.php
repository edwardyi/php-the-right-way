<?php

declare(strict_types=1);

namespace App\ServerInfo\Models;

class SignUp extends Model
{
    public function __construct(protected User $userModel,protected Invoice $invoiceModel)
    {
        parent::__construct();
        // var_dump('construct db...', $this->db);
    }

    public function register(array $userInfo, array $invoiceInfo): ?int
    {
        $invoiceId = null;
        try {
            $this->db->beginTransaction();
            
            $userId = $this->userModel->create($userInfo['email'], $userInfo['name'], true);
            $invoiceId = $this->invoiceModel->create($invoiceInfo['amount'], $userId);
    
            $this->db->commit();
        } catch (\Throwable $e) {
            var_dump('testing...', $this->db);
            if ($this->db->inTransaction()) {
                $this->db->rollback();
            }
            throw $e;
        }

        return $invoiceId;
    }
}
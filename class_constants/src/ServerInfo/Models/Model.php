<?php

declare(strict_types=1);

namespace App\ServerInfo\Models;

use App\ServerInfo\App;
use App\ServerInfo\DB;

abstract class Model
{
    protected DB $db;

    public function __construct()
    {
        $this->db = App::db();
    }
}
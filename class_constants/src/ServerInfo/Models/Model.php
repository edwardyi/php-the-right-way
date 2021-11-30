<?php

declare(strict_types=1);

namespace App\ServerInfo\Models;

use App\ServerInfo\App;
use App\ServerInfo\DB;
use Generator;
use PDOStatement;
use phpDocumentor\Reflection\DocBlock\Tags\Generic;

abstract class Model
{
    protected DB $db;

    public function __construct()
    {
        $this->db = App::db();
    }

    public function fetchLazy(PDOStatement $stmt): Generator
    {
        foreach ($stmt as $record) {
            yield $record;
        }
    }
}
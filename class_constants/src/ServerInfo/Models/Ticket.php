<?php

namespace App\ServerInfo\Models;

use Generator;

class Ticket extends Model
{
    public function findAll(): Generator
    {
        $stmt = $this->db->query("SELECT id,content,title FROM ticket");

        return $this->fetchLazy($stmt);

        // foreach ($stmt as $record) {
        //     yield $record;
        // }

        /**
        foreach ($data->fetchAll() as $row) {
            yield $row;
        } 
        */
        // return $data->fetchAll();
    }
}
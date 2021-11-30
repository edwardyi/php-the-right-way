<?php

namespace App\ServerInfo\Controllers;

use App\ServerInfo\Models\Ticket;

class GeneratorExample
{

    public function __construct(private Ticket $ticket)
    {
        
    }

    public function list_ticket_model()
    {
        echo 'list ticket model';
        echo '<pre>';
        $data = $this->ticket->findAll();
        $data->rewind();
        foreach ($data as $row) {
            echo $row['id'].':'.substr($row['content'], 0 , 11).'<br/>';
        }
        echo '</pre>';

        echo 'second loop';

        echo '<pre>';
        // use same variable given by generator result
        foreach ($data as $row) {
            echo $row['id'].':'.substr($row['content'], 0 , 11).'<br/>';
        }
        echo '</pre>';
    }

    public function large_array()
    {
        $start = 1;
        $end = 3000000;
        // $end = 10;

        $numbers = $this->rangeArrayDataByGenerator($start, $end);

        echo $numbers->current();

        $numbers->next();

        echo $numbers->current();

        $numbers->next();

        echo $numbers->current();

        $numbers->next();

        echo $numbers->current();

        $numbers->next();

        echo "<br/>";

        $helloData = $this->helloGenerator();

        echo $helloData->current();
        
        $helloData->next();

        echo $helloData->current();
        
        $helloData->next();
        
        echo $helloData->getReturn();


        $helloData->rewind();

        foreach ($helloData as $key=>$value) {
            echo $key.'=>'.$value;
        }

    }

    public function rangeArrayData(int $start, int $end)
    {
        // using range function to generate array will cause memory exhausted problem when the array size is large enough
        $numbers = range($start, $end);
        foreach ($numbers as $number) {
            echo $number;
            echo "<br/>";
        }
        echo "</pre>";
    }

    public function rangeArrayDataByGenerator(int $start, int $end): \Generator
    {
        // echo "<pre>";
        // echo "from: $start to $end";
        for ($i=$start; $i<$end; $i++) {
            yield $i*10;
        }
    }

    public function helloGenerator(): \Generator
    {
        echo "Hello";
        yield 'xxxx';

        echo "<br/>";
        echo "World";
        yield "yyyy";

        return "finally ";
    }
}
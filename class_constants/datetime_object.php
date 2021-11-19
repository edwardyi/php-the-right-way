<?php


// https://carbon.nesbot.com/#gettingstarted

require_once("./vendor/autoload.php");

$datetime = new DateTime("05/12/2021 3:33PM");

echo $datetime->getTimezone()->getName().'-'.$datetime->format('m/d/Y g:i A').PHP_EOL;

// setTimezone on the fly
$datetime->setTimezone(new DateTimeZone('Asia/Tokyo'));

echo $datetime->getTimezone()->getName().'-'.$datetime->format("m/d/Y g:i A").PHP_EOL;

$date = '15/06/2021 3:30PM';

try {
    $dateTime = new DateTime($date);
} catch (Error $e) {
    var_dump($e->getMessage()); // Not Executed
} catch (Exception $e) {
    var_dump('Exception =>'.$e->getMessage()); // __construct(): Failed to parse time string
}

// str_replace
$dateTime = new DateTime(str_replace('/', '.', $date));

var_dump($dateTime); // object(DateTime)

// createFromFormat
$dateTime = DateTime::createFromFormat('d/m/Y g:i A', $date);

var_dump($dateTime); // object(DateTime)

$dateTime1 = new DateTime('08/24/2021 9:32AM');
$dateTime2 = new DateTime('08/24/2021 9:32AM');

var_dump($dateTime1 < $dateTime2); // false
var_dump($dateTime1 > $dateTime2); // false
var_dump($dateTime1 == $dateTime2); // true
var_dump($dateTime1 <=> $dateTime2); // 0


$dateTime3 = new DateTime('05/24/2021 3:21AM');
$dateTime4 = new DateTime('11/24/2021 3:21AM');

$dateInterval3 = date_diff($dateTime3, $dateTime4); // DateInterval

// invert 0
echo $dateInterval3->days.PHP_EOL; // DateInterval

$dateInterval3->invert = 0;

var_dump('invert date:', $dateTime4->add($dateInterval3)->format('m/d/Y g:i A'));
// echo $dateInterval3->date.PHP_EOL; // DateInterval

$dateTime5 = new DateTime('06/23/2021 3:32 AM');
$interval = new DateInterval('P3M2D');

$interval->invert = 1;

$dateTime5->add($interval);

echo $dateTime5->format('m/d/Y g:i A').PHP_EOL;


$from = new DateTime();
$to = (new DateTime())->add(new DateInterval('P1M'));

echo $from->format('m/d/Y').'-'.$to->format('m/d/Y').PHP_EOL;


$from1 = new DateTime();
$to1= $from1->add(new DateInterval('P1M'));

echo $from1->format('m/d/Y').'-'.$to1->format('m/d/Y').PHP_EOL; // $from1 will be modified by $to1

$from2 = new DateTime();
$to2 = (clone $from2)->add(new DateInterval('P1M'));

echo $from2->format('m/d/Y g:i A').'-'.$to2->format('m/d/Y g:i A').PHP_EOL;

$from3 = new DateTimeImmutable();
$to3 = $from3->add(new DateInterval('P1M'));

echo 'immutable result:'.$from3->format('m/d/Y g:i A').'-'.$to3->format('m/d/Y g:i A').PHP_EOL;

$to4 = $to3->add(new DateInterval('P1Y'));
echo 'immutable value:'.$to3->format('m/d/Y').'-'.$to4->format('m/d/Y').PHP_EOL;

// generate date series after 4 day interval
$period = new DatePeriod(new DateTime("09/03/2021"), new DateInterval('P4D'), new DateTime('09/30/2021'));

// 09/03/2021
// 09/07/2021
// 09/11/2021
// 09/15/2021
// 09/19/2021
// 09/23/2021
// 09/27/2021
foreach ($period as $date) {
    echo $date->format('m/d/Y').PHP_EOL;
}




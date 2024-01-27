
<?php
//!---- (PHP): Даты: Операции со Временем:
//www.php.net/manual/ru/class.datetime.php

$dates =
[
    "Next monday",
    "Yesterday",
    "",                 // now
    "2016-12-25",       // y-m-d
    "25 December 2016",
    "-1 week",
    "+1 days",
];

foreach($dates as $date)
{
    $dateTime = new DateTime($date);
    //? as a cookie: l, d-M-Y H:i:s T
    echo $dateTime->format(DateTime::COOKIE);
    echo PHP_EOL;
}

//* timestamp:
$weekThatIsNext = time() + (7 * 24 * 60 * 60);

//* калькуляция со временем:
$dateTime = new DateTime;
$dateTime->modify("+1 month");

//! в реальности только этот формат и нужен:
echo $dateTime->format(DateTime::COOKIE).PHP_EOL;

//* сравнение дат:
$now = new DateTime;
$xmas = new DateTime("25 December");
if($now > $xmas)
{
    $xmas = new DateTime("25 December next year");
}
$interval = $xmas->diff($now);
echo "days until xmas: {$interval->days}", PHP_EOL;

//* получаем текущее время в куку:
echo date(DateTime::COOKIE, time()), PHP_EOL;

//* операции с timestamp-ами:
$now = new DateTime;
echo $now->getTimestamp(), PHP_EOL;

//* интервал - это отрезок времени который можно прибавить:
$interval = new DateInterval("P2Y4DT6H8M"); // "P"eriod: 2 года, 4 дня..
$dateTime = new DateTime();
$dateTime->add($interval);
echo $dateTime->format(DateTime::COOKIE), PHP_EOL;
?>


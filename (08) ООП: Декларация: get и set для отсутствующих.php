<?php
//!---- (PHP): OOП: Get и Set для Отсутствующих:

/*
    в отличае от многих языков,
    get/set в php нужны для доступа к ни тем
    членам которые ЕСТЬ, а к тем, которых НЕТ.
*/

//? One:
class One
{
    public function __get($pv) {echo "{$pv} doesn't exits".PHP_EOL;}
    public function __set($ps,$pv) {echo "{$pv}:{$ps} for non existing".PHP_EOL;}

} //c:One

$one = new One();

$r = 
[
    $one->theFirstVariableName,
    $one->theSecondVariableName = 1000,
];

?>
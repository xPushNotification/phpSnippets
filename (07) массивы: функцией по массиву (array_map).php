<?php
//!---- (PHP): Массивы: Исполнение Функции По Массиву (маппинг):

$arr = [1,2,3];

function plusOne($pitem) {return $pitem+1;}
$plusOne = function($pitem) {return $pitem+1;};

$r =
[
    // [2,3,4]
    array_map("plusOne", $arr),   // функция берется по глобальному имени
    array_map($plusOne, $arr),
    array_map(function($pitem) {return $pitem+1;}, $arr),
];
print_r($r);

?>


<?php
//!---- (PHP): Массивы: Сортировка (сортируются на месте):

$f = ["11", "22", "33", "44"];

// сортировка на месте (возвращаемых значений НЕТ)
$sortings =
[
    sort($f),           // восходящая сортировка (asc)
    rsort($f),          // нисходящая сортировка (desc)

    asort($f),          // asc / сохранять индексы
    arsort($f),

    ksort($f),          // asc по ключам
    krsort($f),

    natsort($f),        // "человеческий" порядок
    natcasesort($f),    // чувствительный к регистру

    shuffle($f),        // безпорядочная сортировка

    usort($f, function($a,$b) {return $a<=>$b;}),
    uasort($f, function($a,$b) {return $a<=>$b;}),   // сохранить ключи
    uksort($f, function($a,$b) {return $a<=>$b;}),   // по ключам
];

$a = ["a1","a2", "a11", "a10"];

sort($a);       // a1,a10,a11,a2
natsort($a);    // a1, a2, a10, a11
?>


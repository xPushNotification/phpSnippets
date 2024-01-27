<?php
//!---- (PHP): Массивы: Тоталирование(Сумма) (в SQL:агрегация)

/*
    carry - накопительный регистр (агрегатор)
    item  - текущее значение в массиве
*/
//* сумма элементов:
$r = array_reduce(
    [1,2,3],
    function($carry, $item) {return $carry+$item;}
);
var_dump($r);

//* наибольшее значение:
$r = array_reduce(
    [1,2,3],
    function($carry, $item) {return $item>$carry? $item : $carry;}
);
var_dump($r);

?>


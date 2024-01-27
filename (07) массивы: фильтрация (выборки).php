<?php
//!---- (PHP): Массивы: Фильтрация (Выборки):

// если лямбда вернет по значению true - оно попадет в выборку

$arr = [1,0,2,null, 3];
//* выборка не пустых значений:
$nonempValues
    = array_filter($arr);       // 1,0,2,3

//* выборка кастомной фунцией:
$evenNumbers = array_filter(
    $arr,
    function(int $pv) {return $pv%2 === 0;}
);

//* аналогия выборок SQL и array_filter:
/*
    SQL более показателен для выборок данных,
    поэтому его можно использовать в именовании
    кастомных функций для выборки:
*/
$q = [];
$q['select * from $arr where $arr[n] > 1'] = function($pv)
{
    if($pv != null)
    if($pv > 1)
    {
        return true;
    }
    return false;
};

$result = array_filter(
    $arr,
    $q['select * from $arr where $arr[n] > 1']
);
?>


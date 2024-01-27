<?php
//!---- (PHP): Массивы: Декларация, Тестирование, Стеки:

$arr = [1,2,3, "key"=>"111"];
$arr[] = "4";

$arrayFunctions =
[
    is_array($arr),
    gettype($arr),      // "array"
    count($arr),
    in_array("what", $arr),
    array_keys($arr),
    array_key_exists("key", $arr),
    end($arr),          // последний элемент
];

$stacklikeFunctions =
[
    array_shift($arr),              // pop начало
    array_unshift($arr, "value"),   // push в начало
    array_pop($arr),
    array_push($arr, "value"),      // eq: $arr[]=..
];

// все массивы в php это MAP<key,value>, даже если не заявляется:
$map = 
[
    1 => "1",
    2 => "2",
];
$r = 
[
    isset($map[0]),    // false, for($i=0;..) невозможно
    isset($map[true]), // true это просто ключ [1]
];
print_r($r);

// с [0] по [10] ничего нет: 
$map = 
[
    "zero",       // $map[0] = "zero"
    10 => 10,     // $map[10] = 10,
];
$map["11"] = 11;  // $map[11] = 11;
$map[] = 12;      // $map[12] = 12;   
print_r($map);

?>


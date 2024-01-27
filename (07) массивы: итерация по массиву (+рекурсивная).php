<?php
//!---- (PHP): Массивы: Итерация:

$arr = [1,2,3];

foreach($arr as $value) {}
foreach($arr as $key=>$value) {}

array_walk(
    $arr,
    function(string &$value, string $key)
    {
        $value += 1;    // значение передано по ссылке
        echo "от ключа: $key значение измениться на:$value".PHP_EOL;
    } // f:lambda
);

//* ресурсивный обход массива:
$arr = [1, [2,3,4, [5,6]], 7,8];

array_walk_recursive(
    $arr,
    function(string $value, string $key) {echo "$key:$value, ";}
); // 0:1, 0:2, 1:3, 2:4, 0:5, 1:6, 2:7, 3:8,

?>


<?php
//!---- (PHP): Массивы: deSTRUCTuring:
$arr = [1,2,3];
list($a,$b,$c) = $arr;      // это инструкция, не функция!

// модное деструктурирование как в JavaScript:
$arrayA = ['a' => 1];
$arrayB = ['b' => 2];

$result = ['a' => 0, ...$arrayA, ...$arrayB];

print_r($result);
// ['a' => 1, 'b' => 2]
?>


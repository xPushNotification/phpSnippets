<?php
//!---- (PHP): Строки: Explode, Split, Implode:
$limit = 3;
$r =
[
    explode(",", "1,2,3,4,5", $limit),       // [0]=>1,[1]=>2,[3]=>3,4,5
    str_split("12345", $limit),              // [123,45]
    implode(" ", [1,2,3]),                   // "1 2 3"
];
?>


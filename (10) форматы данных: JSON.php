<?php
//!---- (PHP): Форматы: JSON:
$arr =
[
    "one"=>1, "two"=>2, "thr"=> [1,2,3,4],
];

// {"one":1,"two":2,"thr":[1,2,3,4]}
$json = json_encode($arr);
$arr  = json_decode($json, true);  // 'true' -> как ассоциативный массив

?>


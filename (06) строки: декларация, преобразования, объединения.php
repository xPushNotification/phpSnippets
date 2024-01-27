<?php
//!---- (PHP): Строки: Декларация, Преобразования, Объединение:
$v = "vvv";
$obj = new class {public $one = 111;};

$r =
[
    "ok ".$v,
    "ok $v",
    "ok {$v}",
    "ok {$obj->one}",
];

if("one" == "one") {echo "char by char comparison".PHP_EOL;}

$the = '"the"';
$str = "string $the \"the\"";
echo $str.PHP_EOL;
?>


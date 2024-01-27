<?php
//!---- (PHP): Функции и Глобальные Переменные:

$g = "глобальная переменная";
function doMf()
{
    global $g;
    $v = &$GLOBALS["g"];
    $v = $g;
}
doMf();

$doMf = function() use(&$g) {$v = $g; echo $v;};
$doMf();
?>


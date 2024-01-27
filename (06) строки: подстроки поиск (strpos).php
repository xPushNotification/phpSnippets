<?php
//!---- (PHP): Строки: Поиск Субстрок::
$str = "aabb";

$pos = mb_strpos($str, "aa");
if($pos !== false) {echo "Позиция в строке:: {$pos}".PHP_EOL;};   // 0!

// учитываем, что корректный ответ это и 0 в том числе:
if(strpos($str, "aa")) {echo "так не стоит использовать";}

// учитываем, что strpos с кириллицей делает ошибки:
$str = "строка на кириллице";
$posStrpos = strpos($str,"трока");
$posMbstrpos = mb_strpos($str,"трока");
if($pos !== false)
{
    echo "Позиция в строке strpos:: {$posStrpos}".PHP_EOL;     // 2!
    echo "Позиция в строке strpos:: {$posMbstrpos}".PHP_EOL;   // 1
}

?>


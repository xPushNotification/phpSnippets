<?php
//!---- (PHP): Сравнение с Использованием Типов:

$a = (bool)false;
$b = "";

$r =
[
    $a ==  $b,      // true
    $a !=  $b,      // false 
    $a === $b,      // false
    $a !== $b,      // true
];

print_r($r);

/*
    сравнение с использованием типов надо использовать всегда 
    когда речь идет о получении чего либо, что может вернуть буквально
    ноль - и это будет правильный ответ
    (а ноль преобразуется интерптетатором автоматически в false)
*/
$str = "aabbcc";
$pos1 = strpos($str, "aa");
if($pos1 !== false) {echo "position is: {$pos1}".PHP_EOL;};   // 0!
var_dump($pos1);     // int(0)

$pos2 = strpos($str, "dd");
var_dump($pos2);     // bool(false)

if($pos1 == $pos2) {echo "int(0) == bool(false)".PHP_EOL;}

?>


<?php
//!---- (PHP): Генерируемые Имена:

// глобальное объявление переменных это объявление их в контексте 
// GLOBALS или объекта (функция это тоже объект) куда они и попадают

$z = "v";
${$z} = 'set the value to $v';      // переменная имя которой находится в $z
$$z = 'equal to ${$z}';

echo $v;
echo PHP_EOL;

$s = function(){echo "s function".PHP_EOL;};
$f = function()
{
    $z = "vv";
    $$z = "value of 'vv'";

    echo $vv;
    echo PHP_EOL;

    //* сама фукнция может видеть свой объект в массиве GLOBALS:
    $s = $GLOBALS["s"];  $s();
    $f = $GLOBALS["f"];
    var_dump($s);
    var_dump($f);
};
$f();

?>


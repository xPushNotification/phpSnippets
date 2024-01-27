<?php
//!---- (PHP): Константы:

define("MY_CONST", 111);            // определением
class AConst
{
    const MY_CONST = 100;           // декларацией
    final const SE_CONST = 200;
}
class BConst extends AConst
{
    const MY_CONST = 200;
    // const SE_CONST = 300;
}

$r = 
[
    MY_CONST,
    AConst::MY_CONST,
    BConst::MY_CONST,
];

print_r($r);

?>


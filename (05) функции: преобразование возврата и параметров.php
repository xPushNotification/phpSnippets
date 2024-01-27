<?php
//!---- (PHP): Функции: Преобразование Возврата и Параметров:

function test(?string $ptest) : ?string
{
    echo gettype($ptest), PHP_EOL;
    return 1;
}
$one = test(123);
echo gettype($one), PHP_EOL;
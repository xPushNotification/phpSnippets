<?php
//!---- (PHP): Тесты для Переменных:

$v = 
[
    "INT"       => 100,
    "EMPTY"     => "",
    "FLOAT"     => 10.1,
    "ARRAY"     => [],
    "OBJECT"    => (object)[],
    "FUNCTION"  => function(){},
];

$checks = 
[
    isset($v["INT"]),
    empty($v["EMPTY"]),
    is_array($v["ARRAY"]),
    is_object($v["OBJECT"]),
    gettype($v["FUNCTION"]),
    is_callable($v["FUNCTION"]),      // gettype вернет object
    get_class($v["OBJECT"]),
];

print_r($checks);

?>


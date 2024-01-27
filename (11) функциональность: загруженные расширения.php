<?php
//!---- (PHP): Проверка Загруженных Расширений PHP и Функций:

$r = 
[
    "randomBytesIsLoaded" => function_exists("random_bytes"),
    "extensionIsLoaded" => extension_loaded("gd"),
];
print_r($r);

if(!$r["extensionIsLoaded"])
{
    echo "Extension isn't loaded".PHP_EOL;
}

?>


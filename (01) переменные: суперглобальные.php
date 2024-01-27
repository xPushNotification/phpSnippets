<?php
//!---- (PHP): Массивы Глобальных Переменных:
$globalVars = 
[
    $GLOBALS,
    $_SERVER,   // пути, хедеры
    $_GET,
    $_POST,
    $_FILES,    // загружаемые файлы полученные в результате post запросов
    $_COOKIE,
    $_SESSION,  // не будет видна в cli варианте
    $_REQUEST,  // комбинация: $_POST + $_GET + $_COOKIE
    $_ENV,      // окружение ОС
];

$globalConstants = 
[
    DIRECTORY_SEPARATOR,
    PHP_EOL,
];

print_r($globalVars);
print_r($globalConstants);

?>


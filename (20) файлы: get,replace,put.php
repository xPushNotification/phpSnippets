<?php
//!---- (PHP): Файлы: Get/Replace/Put:
/*
    обработка файлов целиком - это сразу 
    очень плохая идея
    так как скрипт начинает сразу занимать
    в памяти размер всего файла.
*/

$path = "file.txt";
$content
    = file_get_contents($path);
$content
    = str_replace("\r\n", "\n", $content);
file_put_contents($path, $content);

?>


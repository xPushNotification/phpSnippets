<?php
//!---- (PHP): Безопасность: Хранение Файлов в Базе:
/*
    данные вроде скриптов - в базу лучше вставлять
    кодироваными
*/

$taggedString
    = file_get_contents("https://yandex.ru");
$r =
[
    base64_encode($taggedString),
];

?>



<?php
//!---- (PHP): Файлы: Проверка флагов Доступа и Модификации:
/*
    PHP не может(!) отследить флаги в файле 
    больше одного раза с того момента 
    как скрит запущен (изменение флагов не будет фиксироваться).

    PHP может модифицировать a/m флаги через системный 
    "touch(filename,[mtime],[atime])"
*/

$dformat = "Y-m-d";
$r =
[
    date($dformat, filemtime("file.txt")),      // m- [m]odify
    date($dformat, fileatime("file.txt")),      // a- [a]ccess
];

?>


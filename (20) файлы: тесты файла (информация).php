<?php
//!---- (PHP): Файлы: Информация о Файле:

$directoryname = $dn = "/this/is/directory/";
$filename = $fn = "/this/is/file.txt";

$filefunctions =
[
    is_dir($fn),
    is_file($fn),
    file_exists($dn),
    filetype("~"),      // dir
    is_writable($fn),
    is_readable($fn),
];
?>


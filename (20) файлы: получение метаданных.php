<?php
//!---- (PHP): Файлы: Получение Метаданных:

$finfo = finfo_open(FILEINFO_MIME_TYPE);

foreach(glob("*") as $filename)
{
    echo finfo_file($finfo, $filename).PHP_EOL;
}
finfo_close($finfo);
?>


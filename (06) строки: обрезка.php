<?php
//!---- (PHP): Строки: Обрезка:

// всего 10 символов, от нулевого до "..."
$ret = mb_strimwidth("Hello World", 0, 10, "...");

echo $ret.PHP_EOL;

//? удалиить начальный и конечные пробелы:
$str = " the string ";
$str = trim($str);

echo $str.PHP_EOL;

?>


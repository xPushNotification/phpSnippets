<?php
//!---- (PHP): Форматы: CSV из Файла:

//* пишем файл:
$fileName = "test.csv";
$dataString = "1,2,3,4,5";
file_put_contents($fileName, $dataString);

//* читаем файл (построчно):
$handle = fopen($fileName, "r");
$i = 0;
while($fileRows = fgetcsv($handle))
{
    print_r($fileRows);

    if($i>5) break;
    $i++;
}
fclose($handle);
$r =
[
    gettype($fileRows),     // array
    count($fileRows),       // 5
];
?>


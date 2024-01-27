<?php
//!---- (PHP): Файлы: Чтение Файлов без Попадания в Память:
/*
    файлы для того и нужны чтобы 
    заменять память, чем больше скрипт работает с диском
    тем он меньше работает с памятью
*/

$getMemoryUsage = function()
{
    var_dump(memory_get_usage(true));
};

//* прямая загрузка:
$getMemoryUsage(); // 262144
$arr = file("top_1m.csv");
$getMemoryUsage(); // 210501632

//* оптимизированная:
$getMemoryUsage(); // 262144
$handle = fopen("top_1m.csv", "r");
if($handle !== false)
{
    while(($row = fgetcsv($handle, 1000, ",")) !== false)
    {
        file_put_contents(
            "top_1m_out.csv",
            $row,
            FILE_APPEND
        );
    }
    fclose($handle);
}
$getMemoryUsage(); // 262144

?>


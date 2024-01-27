<?php
//!---- (PHP): Вывод: Работа с Буфером:
////---->>>>
/*
    ob_start            -- начать вывод в буфер
    ob_get_contents     -- получить контент в буфере от ob_start
    ob_end_clean        -- выключить и очистить буфер
    ob_get_clean        -- ob_get_contents + ob_end_clean
    ob_get_level        -- уровень вложенности буфера
    ob_flush            -- отослать контент клиенту
    ob_end_flush        -- ob_flush + ob_end_clean
*/
////----<<<<

ob_start();
echo "пример один";
$content = ob_get_clean();
echo $content;

// так как буфер меняет логику кода,
// а вывод в него очень показателен, это можно выделить:

$content = "";
if("buffer")
{
    ob_start();
    echo "пример два";
    //* ob_get_contents + ob_end_clean: вывод в буфер завершен:
    $content = ob_get_clean();
}
echo $content.PHP_EOL;

?>


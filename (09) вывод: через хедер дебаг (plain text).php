
<?php
//!---- (PHP): Вывод: Вывод переменных для отладки:

if(isset($debug))
if($debug == "yes")
{
    header("Content-Type: text/plain; charset=utf-8");

    $exports =
    [
        var_export([1,2,3], true),
        var_export("string", true),
        var_export(1001, true),
    ];
    print_r($exports);
    exit;
}
//* импорт кода:
$dumpStr = var_export([1,2,3], true);

eval('$somevar = '.$dumpStr.';');
?>


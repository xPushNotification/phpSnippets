<?php
//!---- (PHP): Функции: Возврат Нескольких Значений с list()
function returnListOfVariables(): Array
{
    return ["variableOne","variableTwo"];
}

list($a,$b) = returnListOfVariables();

print_r([
    $a,
    $b,
]);

/*
    проблема заключается в том - что мы не можем вернуть
    таким образом массив по ссылке
    что означает - что у нас гарантированная проблема с работою с буферами 
    представляющими html - что характерно для диски

    return &["theVariableOne", "theVariableTwo"];     -- семантика недопустима
    function test(): &Array                           -- и такая тоже

    вторая проблема заключается в том,
    что мы все таки КОПИРУЕМ значение в переменные при задании лист

    list(&$a,&$b) = returnBigListOfVariables();       -- подобная семантика также недоступна
*/
function returnBigListOfVariables(&$pparams): Array
{
    if(isset($pparams["return"])) {var_dump($pparams["return"]);}
    
    $pparams["return"] = ["theVariableOne","theVariableTwo"];

    return [];
}
$p = [];
returnBigListOfVariables($p);
list($a,$b) = $p["return"];         // проброс произошел успешно, но смысл в этой конструкции тогда?
print_r([
    $a,
    $b,
]);
// однако здесь все отлично, мы можем пробросить значение без копирования вниз
returnBigListOfVariables($p);
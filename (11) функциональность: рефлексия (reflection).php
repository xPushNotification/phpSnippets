<?php
//!---- (PHP): Рефлексия (reflections):

//! внутри класса:
class One
{
    public $one;
    public $two;
}

$class = One::class;        // в классе есть метаданные
echo $class, PHP_EOL;

$one = new One();
$class = $one::class;
echo $class, PHP_EOL;

//! получение тела функции:
function doMyfunction(int $a):bool
{
    echo $a;
    return true;
}

$func = new ReflectionFunction("doMyFunction");

$funcInfo = (object)
[
    "fileName" => $func->getFileName(),
    "startLine"=> $func->getStartLine()-1,  // для 'function' блока
    "endLine"  => $func->getEndLine(),
    "body"     => "",
];

$length = $funcInfo->endLine - $funcInfo->startLine;
$source = file($funcInfo->fileName);
$funcLines
    = array_slice($source, $funcInfo->startLine, $length);

$funcInfo->body
    = implode("", $funcLines);

print_r($funcInfo->body);
?>


<?php
//!---- (PHP): Ссылки и захват ссылкою:

$arr = [];
$obj = new stdClass();

$refCopied =
[
    &$arr,  // массивы копируются по значению
    $obj,   // объекты копируются по ссылке
    &$obj,  // eq: =$obj
];

$valCopied =
[
    $arr,
    //* копируется по значению клонированием 
    //* (в объекте требуется function __clone())
    clone $obj,     
];

$refFunctions =
[
    function & () {static $a = []; return $a;},
    function (&$pv) {$pv += 1;},
];

// захват ссылкою для модификации "in place":
$table = [];
$csv = <<< DOC
Year,Make,Model,Length
1997,Ford,E350,2.35
DOC;
$csvRows = [];
$csvRows = str_getcsv($csv, "\n");

foreach($csvRows as &$row)                 // !!!
{
    $row = str_getcsv($row, ",");
}
?>


<?php
//!---- (PHP): Массивы: Whitelist для Ключей:
$parameters = ["a"=>"000", "b"=>"111", "c"=>"222"];
$allowedKeys = ["a", "b"];

$allowedKeys
    = array_flip($allowedKeys);  // ["a"=>"", "b"=>""]

$filteredKeys = array_intersect_key(  // ["a"=>"000", "b"=>"111"]
    $parameters,
    $allowedKeys
);
print_r($filteredKeys);

/*
    однако,
    корректным методом программирования является 
    все таки заполнение промежуточных переменных
    согласно их искомым ключам,
    программа ДОЛЖНА корректно отработать при любом
    сценарии пришедших в неё данных.
*/
$allowedKeyA = "default"; 
    if(isset($parameters["a"])) $allowedKeyA = $parameters["a"];
$allowedKeyD = "default";
    if(isset($parameters["d"])) $allowedKeyD = $parameters["d"];
var_dump($allowedKeyA);
var_dump($allowedKeyD); // default
?>


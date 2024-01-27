<?php
//!---- (PHP): SPL: Map:

$bucket   = new SplObjectStorage;
$file     = new StdClass;
$metadata = ["name"=>"password.txt", "size"=>"10240"];

//? ключем может быть что угодно
$bucket[$file] = $metadata; 

?>


<?php
//!---- (PHP): Форматы: HTML:
/*
    PHP поддерживает селекторы на уровне 
    html псевдо дома.
*/

$html = '<html><body><span id="text">hello world</span></body></html>';
$doc  = new DOMDocument;
libxml_use_internal_errors(true);
$doc->loadHTML($html);

$r =
[
    $doc->getElementById("text")->textContent,
];
print_r($r);
?>


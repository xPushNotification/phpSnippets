<?php
//!---- (PHP): Строки: Частичная Замена:

/*
    Чтобы было понятно, что в коде происходит
    рекомендуется соблюдать нотацию именования:

    subject      -- где ищется (база поиска)
    targets      -- что ищется 
    replacements -- на что будет замещаться
*/


$subject = "aabbxx";           // где
$targets = ["aa","bb"];        // что
$replacments = ["11","22"];    // на что

$r =
[
    str_replace($targets, $replacments, $subject),
    str_replace("__","11","ab__cd"),
    substr_replace($subject,"",-1),   // удалить последний символ
];
print_r($r);        // [1122xx, ab11cd, aabbx]


?>


<?php
//!---- (PHP): Массивы: Пропущенные Ключи:

$_POST["username"] = "name";

$keys =
[
    "required"  => ["username", "password", "csrf_token"],
    "post"      => array_keys($_POST),
    "missing"   => [],
];

$keys["missing"]
    = array_diff($keys["required"], $keys["post"]);

if(count($keys["missing"]))
{
    echo "You need to provide:".PHP_EOL;
    print_r($keys["missing"]);
}

?>


<?php
//!---- (PHP): Куки:
// для установки кук лучше использовать js, а не php

$cookie = (object)
[
    "name" => "data1",
    "value"=> "data2",
];

//? сработает только ПЕРЕД любым выводом:
setcookie(
    $cookie->name,
    $cookie->value,
    time()+(86400*30),
    "/"
);

if(isset($_COOKIE[$cookie->name])) {print_r($_COOKIE);}
else {echo "cookie {$cookie->name} is not set";}
?>


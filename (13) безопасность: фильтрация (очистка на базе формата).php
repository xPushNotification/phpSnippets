<?php
//!---- (PHP): Безопасность: Фильтрация:
$_POST = []; $_POST["sender"] = "john@example.com";
$from = $_POST["sender"];
$from = filter_var($from, FILTER_SANITIZE_EMAIL);

$data = (object)
[
    "email"  => "john@example.com",
    "number" => "+1 unicorn",
    "url"    => "https://example.com/index.php?test=y",
    "html"   => "<p>Example</p>",
];

$sanitizations =
[
    filter_var($data->email,  FILTER_SANITIZE_EMAIL),
    filter_var($data->number, FILTER_SANITIZE_NUMBER_INT),   // +1
    filter_var($data->url,    FILTER_SANITIZE_URL),
    filter_var($data->html,   FILTER_SANITIZE_STRING),       // Example
];
var_dump($sanitizations);
?>


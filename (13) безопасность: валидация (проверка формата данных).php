
<?php
//!---- (PHP): Безопасность: Валидация:

$validations =
[
    filter_var("johnexample.com", FILTER_VALIDATE_EMAIL),   // false
    filter_var("example.com", FILTER_VALIDATE_URL),
];
var_dump($validations);

?>


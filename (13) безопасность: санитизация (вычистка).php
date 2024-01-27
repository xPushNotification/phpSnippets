<?php
//!---- (PHP): Безопасность: Санитизация:
$sanitizedValues =
[
    htmlspecialchars($v),
    htmlentities($v),
    strip_tags($v, "<br><p>"),
    strip_tags($v, ["br", "p"]),
    filter_var($v, FILTER_SANITIZE_STRING),
];

?>


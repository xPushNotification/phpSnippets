<?php
//!---- (PHP): Файлы: Добавление Контента:
$username = "user";
file_put_contents(
    "logins.log",
    "{$_SESSION[$username]} logged in",
    FILE_APPEND | LOCK_EX
);

?>


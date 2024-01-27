<?php

//!---- (PHP): Сессии:
/*
    так как сессии оперируют с хедерами
    вывод до окончания работы с сессиями производить нельзя

    сами сессии представляют собою не больше чем 
    файл с данными пользователя (серверные куки)
*/

//! Создаем Сессию и Пишем в неё Данные:
//* создание сессии:
$CFG_SESSION =
[
    "cache_limiter" => "private",
    "read_and_close"=> true,
];
session_start($CFG_SESSION);

//* использование сессии:
if(!isset($_SESSION["login"]))
{
    echo "Please login first";
    exit;
}

//* пишем данные в сессию:
$_SESSION["id"] = 123;

//* получаем данные НЕ опираясь на массив $_SESSION:
$session = (object)
[
    "user" => $_SESSION["login"] ?? "none",
    "name" => $_SESSION["name"] ?? "anon",
];

//* сохранить данные в ФАЙЛ сессии из массива $_SESSION:
session_write_close();

//! Уничтожаем сессию:
session_start();

if(ini_get("session.use_cookies"))
{
    $p = session_get_cookie_params();
    setcookie(
        session_name(),
        "",
        time()-42000,
        $p["path"], $p["domain"], $p["secure"], $p["httponly"]
    );
}
session_destroy();
?>


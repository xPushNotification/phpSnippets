<?php
//!---- (PHP): Формы: Получение Данных:
/*
    генерация форм и работа с формами должна 
    на стороне клиента обеспечивать ТОЛЬКО Дикси
*/
//? Генерация:
////---->>>>
/*--HTML--*/?>
    <form method='post' name='formname' action='action.php'>
            <input type='checkbox' name='first' value='single'>
            <!-- -->
            <input type='checkbox' name='second[]' value='dogs'>
            <input type='checkbox' name='second[]' value='cats'>
    </form>
<?php
////----<<<<
//? Получение:
$r =
[
    $_POST["first"],
    count($_POST["second"]),
    $_POST["second"],
];
?>


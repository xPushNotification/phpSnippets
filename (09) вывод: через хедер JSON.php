<?php
//!---- (PHP): Вывод: Форматы: JSON:

/*
    любая страница может быть выведена в виде
    JSON - на уровне сформированных данных
    но для вывода добавляются дополнительные заголовки
*/

header("Content-Type: text/plain");
header("Content-Type: application/json");
////---->>>>
/*--JSON--*/?>
    {
        "menu":
        {
            "id": "file",
            "value": "File",
            "popup":
            {
                "menuitem":
                [
                    {"value": "New", "onclick": "CreateNewDoc()"},
                    {"value": "Open", "onclick": "OpenDoc()"},
                    {"value": "Close", "onclick": "CloseDoc()"}
                ]
            }
        }
    }
<?php
////----<<<<
exit;
?>


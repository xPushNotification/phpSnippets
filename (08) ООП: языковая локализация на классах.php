<?php
//!---- (PHP): OOП: Языковая Локализация на Классах:

/*
    любая локализация всегда - расширение константа

    при этом константа может быть и значением
    и ПУТЕМ по которому будет браться 
    локализованный кусок.

    решения о локализации НЕ НУЖНО выносить 
    в какую либо переменную или подобное
    если контроллер поддерживает локализацию
    он должен это продемонстрировать внутри себя
*/

//? file: EngMessages.localization.php
class EngMessages
{
    const
    CREATE_A_MENU = "Create a menu",
    CLOSE_THE_MENU = "Close the menu";         // non localized
}

//? file: RuMessages.localization.php
require_once("EngMessages.localization.php");
class RuMessages extends EngMessages
{
    const
    CREATE_A_MENU = "Создать меню";
}

//? итоговый контроллер:
$language = "ru";
$msgs = null;
switch($language)
{
    case "eng":
        require_once("EngMessages.localization.php");
        $msgs = new EngMessages;
        break;
    case "ru":
        require_once("RuMessages.localization.php");
        $msgs = new RuMessages;
        break;
    default:
        require_once("EngMessages.localization.php");
        $msgs = new EngMessages;
}
echo $msgs::CREATE_A_MENU.PHP_EOL;    // локализация ВСЕГДА константою
echo $msgs::CLOSE_THE_MENU.PHP_EOL;

?>


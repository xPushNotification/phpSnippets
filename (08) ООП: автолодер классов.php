<?php
//!---- (PHP): OOП: Автозагрузка Классов:

/*
    все таки рекомендуется руками подключать те 
    классы которые требуются,
    так как инструкция подключения класса 
    кроме всего прочего еще и демонстрирует связь
    между файлами.
*/

//* autoloader.php
spl_autoload_register(
    function(string $pclassName) {require_once("".$pclassName.".php");}
);

//* testy.php
class Testy{}

//* controller.php
require "autoload.php";
$testy = new Testy;

?>


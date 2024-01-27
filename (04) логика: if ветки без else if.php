<?php
//!---- (PHP): Организация читабельных IF веток:

//? подобный подход не корректен (будет спагетти):
$isMale = false;
$isTall = true;

//* очень высокий потенциал запутывания (и тут всего два условия):
if($isMale && $isTall) {echo "и высокий и мужчина";}
else if(!$isMale && $isTall) {echo "не мужчина, но высокий";}
else if($isMale && !$isTall) {}
else {}

// корректный поток веток:
//   дефолты                             <- предустановки
//   if(условие..) {.. }                 <- модификации
//   if(условие..) {.. exit}             <- ветка альтернативного контроллера
//   дефолтный_сценарий                  <- default контроллер

$character = (object)           //* Модель
[
    "tall" => "no",
    "male" => "no",
];
                                //* Контроллер
if($isMale) {$character->male = "yes";}
if($isTall) {$character->tall = "yes";}

print_r($character);            // <- данные можно тестировать

$text = (object)
[
    "male" => "",
    "tall" => "",
];

//* только простые ветки IF:
$text->male = "не мужчина";
if($character->male == "yes") {$text->male = "мужчина";}

$text->tall = "не высокий";
if($character->tall == "yes") {$text->tall = "высокий";}

print_r($text);                 // <- данные можно тестировать
$result = "{$text->tall} {$text->male}";
echo $result.PHP_EOL;
?>


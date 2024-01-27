<?php
//!---- (PHP): Форматы: INI:

//? в именовании переменных не нужно больше 2х слов:
$stringOfINI = <<< DOC
; Пример конфигурационного файла

[first_section]
one = 1
animal = BIRD

[second_section]
path = "/usr/local/bin"

[third_section]
phpversion[] = "5.0"
phpversion[] = "5.1"

urls[svn] = "http://svn.php.net"
urls[git] = "http://git.php.net"
DOC;

//* читаем из строки:
$parsedValues = parse_ini_string(
    $stringOfINI, 
    true      // 'true' с секциями
);
print_r($parsedValues);

//* читаем из файла:
$parsedValues = parse_ini_file(
    "sample.ini",
    true      // с секциями
);
print_r($parsedValues);

?>


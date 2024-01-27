<?php
//!---- (PHP): Строки: Regexp: Замещение (не будет работать с именованными группами):
$subject = "April 15, 2003";
$p = (object)
[
    "month" => "(\w+)",     // April
    "day"   => "(\d+)",     // 15
    "year"  => "(\d+)",     // 2003
];
//? подчеркиваем говорящие имена:
$pattern = "/{$p->month} {$p->day}, {$p->year}/i";  // case [i]nsensitive 
$template = "${1}:month, ${3}:year, ${2}:date";     // ${index}

$r =
[
    preg_replace($pattern, $template, $subject),
    // April:month, 2003:year, 15:date
];

//? удалим лишние пробелы:
$str = " the   string";
$result = preg_replace("/\s+/", " ", $str);

?>


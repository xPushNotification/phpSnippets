<?php
//!---- (PHP): Строки: Regexp: Поиск:
/*
    ГДЕИЩЕМ           -> 'subject'
    ЧТОИЩЕМ           -> 'target'
    КАКЭТОВЫГЛЯДИТ    -> 'pattern'

    'pattern' долен быть (1)именован, 
    и сопровождаться (2)примером. 

    $target    =       "<.*?>"; 
    $subject   =       $_GET["email"];
*/

$subject = "some <strong>html</strong> text";

$p = (object)
[
    "nonGreedy"  => "<.*?>",    // <strong>
    "greedy"     => "<.*>",     // <strong>__</strong>
];
$pattern = "/{$p->greedy}/";
$matches =
[
    "one" => [], "all" => [],
];

preg_match($pattern, $subject, $matches["one"]);
preg_match_all($pattern, $subject, $matches["all"]);

var_dump($matches["one"]);     // [0] <strong>
print_r($matches["all"]);
////----------->>>>
/*
array(1){
[0]=>		-- индекс группы()
array(2){
    [0]=> string(8) <strong>
    [1]=> string(9) </strong>
}
}
*/
////-----------<<<<
?>


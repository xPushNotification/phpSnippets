<?php
//!---- (PHP): Рандомизация:

$random = (object)
[
    "min" => 10,
    "max" => 20,
];
$r = random_int($random->min, $random->max);

$randomByteSet = random_bytes(8);
$randomize =
[
    bin2hex($randomByteSet),    // d7e263202be1b99b
    uniqid(),                   // 4b3403665fea6
    uniqid("php_"),

    function(int $plength = 13)
    {
        $part = ceil($plength / 2);
        $byteSet = random_bytes($part);
        $hex = bin2hex($byteSet);  // hex is twice as size

        return substr($hex, 0, $plength);
    },

];
?>


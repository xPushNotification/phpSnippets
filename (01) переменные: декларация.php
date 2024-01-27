<?php
//!---- (PHP): Переменные:

$z = "";
$v = new stdClass;
$v = new class {public $m1 = "value", $m2 = [];};

$r = 
[
    0 => "value",
    "key" => new class{},
    1,2,3,
    [1,2,3],
];

$v = function() use($z) {};

$GLOBALS["v"] = "";

$v = (object)
[
    "one" => 1,
    "two" => 2,
    "fun" => function() {echo "f";},
];

echo $v->one;
($v->fun)();      // not $v->fun();

print_r($v);
var_dump($v);

unset($v);
//-eq:
$v = null;

$r =
[
    isset($v),  // false
    empty($v),  // true
];
print_r($r);

?>
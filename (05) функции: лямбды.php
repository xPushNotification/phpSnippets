
<?php
//!---- (PHP): Замыкания и Лямбды:

$doLambda = function(string $a, string $b) {return $a.$b;};
$lamdaChecks =
[
    gettype($doLambda),       // object
    get_class($doLambda),     // closure
    is_callable($doLambda),   // true
];
print_r($lamdaChecks);

$v = "data";
$closures =
[
    function() use($v) {echo $v;},
    function() use(&$v) {$v+=1;},
];

(function()
{
    echo "исполняемая на месте функция";
})();

?>


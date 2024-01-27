<?php
//!---- (PHP): Альтернативные Варианты Передачи Параметров:

//* используем:
$f = function($pparams)
{
    //* зона дефолтов:
    $one = 1;
    $two = 2;
    
    //* зона установки:
    if(isset($pparams["one"])) 
        if(gettype($pparams["one"]) == "integer") 
            $one = $pparams["one"];
    if(isset($pparams["two"])) 
        if(gettype($pparams["two"]) == "integer") 
            $two = $pparams["two"];
    
    //* работа с переменными функции:
    echo "".$one.":".$two.PHP_EOL;
};
$f(["one"=>111,"two"=>222]);

//* вариант 1:
$alternateParams = function($a = [], $b = [])
{
    $pparams = [];
    $pparams["one"] = 1;
    $pparams["two"] = 2;

    if($a != []) {$pparams[$a[0]] = $a[1];}
    if($b != []) {$pparams[$b[0]] = $b[1];}

    print_r($pparams);

}; //f:alternateParams

$alternateParams(["one", 1], ["two", 2]);
$alternateParams(["two", 2], ["one", 2]);
$alternateParams(["one", 1]);

//* вариант 2:
function test($pparams = [])
{
    $key1 = "default";
    $key2 = "default";

    foreach($pparams as $key=>$value)
    {

        if(!isset($pparams[$key][0])) continue;
        if(!isset($pparams[$key][1])) continue;
        if(gettype($pparams[$key][0]) !== "string") continue;

        if($pparams[$key][0] == "key1") {$key1 = $pparams[$key][1];}
        if($pparams[$key][0] == "key2") {$key2 = $pparams[$key][1];}
    }

    echo $key1." and ".$key2;

} //f:test

test([
      ["key1", 111], ["key2", 222],
]);

?>


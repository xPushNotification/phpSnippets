<?php
//!---- (PHP): OOП: Декларация: Var / Блоковая Декларация:

//? One::
class One
{
    var $one = 1;       // eq: public $one
    var $two = 2;
    var $thr = 3;

    var //:
        $four = 4,
        $five = 5;

    protected //:
        $seven = 7,
        $eight = 8;

    function doOne(){}
    function doTwo(){}

    public $m1 = "data", $m2 = "data";

    public function __construct(){}

} //c:One

$one = new One();

?>


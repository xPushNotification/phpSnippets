<?php
//!---- (PHP): OOП: Форсированная Типизация:

//? Inner::
class Inner
{}

//? One::
class One
{
    //* переменная (авто конструктор):
    public Inner $inner;            

    public function __construct(){}

    //* возвращаемое значение и параметр:
    public function test(Array &$parray): bool  
    {
        print_r($parray);
        return true;
    }

} //c:One

$p = [1,2,3];
$one = new One();
$one->test($p);

?>


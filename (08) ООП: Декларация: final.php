<?php
//!---- (PHP): OOП: Декларация: Final:

//* в декларации классов:
//? One::
final class One {}
// class Two extends One{} -- невозможно расширить финальный класс

//* в функциях (нельзя переопределить):
class Two
{
    final public function test(){}

} //c:Two

//* в переменных:
//? Thr::
class Thr
{
    //final public $one = "111"; -- final только для констант
    final public const one = 111;
    public const two = 222;

} //c:Thr

//? Four::
class Four extends Thr
{
    public const two = 333;     // переопределяется
    //public const one = 444;   // нельзя переопределить

} //c:Four

$r = 
[
    Thr::one,
    Four::one,
    Four::two,
];
print_r($r);

?>


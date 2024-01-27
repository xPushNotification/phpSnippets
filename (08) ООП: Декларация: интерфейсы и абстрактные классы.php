<?php
//!---- (PHP): OOП: Декларация: Интерфейсы и Абстрактные Классы:

//* в интерфейсе все функции публичные (причина очевидна):
/*
    но так как преобразование ссылки нельзя сделать 
    в сторону IOne интерфейс - это просто 
    упрощение декларации

    IOne $one = new One(); - php сделать не даст
*/

//? IOneFirst::
interface IOneFirst
{
    function doOne();
    function doTwo();

} //i:IOneFirst

//? IOneSecond::
interface IOneSecond
{
    function doThr();
    function doFou();

} //i:IOneSecond

//? One::
class One implements IOneFirst,IOneSecond
{
    public function doOne() {}
    public function doTwo() {}
    public function doThr() {}
    public function doFou() {}

} //c:One

//* абстрактный класс - просто класс с НЕКОТОРЫМИ абстрактными функциями:
//? AOne::
abstract class AOne
{
    public function doOne() {echo "111".PHP_EOL;}
    abstract function doTwo();

} //ac:Aone

//? ATwo::
class ATwo extends AOne
{
    public function doTwo(){}

} //c:ATwo

$two = new ATwo();
$two->doOne();


?>


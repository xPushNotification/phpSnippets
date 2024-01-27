<?php
//!---- (PHP): OOП: Декларация: New в Инициализации:

/*
    выглядит так как будто работает не так 
    как надо. на самом деле можно обойтись
    и без подобной декларации
    к тому же она противоречит стандартизации
*/

//? Status::
class Status 
{
    public $data = "the data";

} //c:Status

//? One::
class One
{
    public function test(Status $pstatus = new Status()){echo $pstatus->data.PHP_EOL;}
    public function __construct(){}

} //c:One

//? Two::
class Two
{
    public function __construct(Status $pstatus = new Status()){echo $pstatus->data.PHP_EOL;}

} //c:Two

$one = new One();
$one->test();

$two = new Two();

?>


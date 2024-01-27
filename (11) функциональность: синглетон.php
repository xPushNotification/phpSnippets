<?php
//!---- (PHP): Синглетон:

//? Singleton::
class Singleton
{
    private static $instance = null;

    private function __construct(){}

    static function getInstance()
    {
        if(!isset(self::$instance))
        {
            self::$instance = new self();
        }
        return self::$instance;

    }//m:getInstance

}//c:Singleton

$singleton = Singleton::getInstance();

//? SingletonTrait::
trait SingletonTrait
{
    private $instance = null;
    private function __construct(){}

    static function getInstance()
    {
        if(!isset(self::$instance))
        {
            self::$instance = new self();
        }
        return self::$instance;

    }//m:

}//t:SingletonTrait

//? ClassWithSingleton::
class ClassWithSingleton
{
    use SingletonTrait;

}//c:ClassWithSingleton

$obj = ClassWithSingleton::getInstance();
?>


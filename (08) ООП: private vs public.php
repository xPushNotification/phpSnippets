<?php
//!---- (PHP): OOП: Public vs Private:
/*
  Родитель и потомок могут иметь в своем 
  распоряжении персональную private характеристику
  
  private потомка не перезапишет priavate от родителя),
  а вот public перезапишет.
*/
class Base
{
  public $one = 111;
  private $two = 222;   
    public function getOne(){return $this->one;}
    public function getTwo(){return $this->two;}
}
class Extender extends Base
{
  public $one = 333;
  private $two = 444;  
    public function getOne(){return $this->one;}
    public function getOneParent(){return parent::getOne();}
    public function getTwo(){return $this->two;}
    public function getTwoParent(){return parent::getTwo();}
}

$extender = new Extender();
//* выдача от public:
echo $extender->getOne().PHP_EOL;       // 333
echo $extender->getOneParent().PHP_EOL; // 333

//* выдача от protected:
echo $extender->getTwo().PHP_EOL;       // 444 from Extender
echo $extender->getTwoParent().PHP_EOL; // 222 from Base

var_dump($extender);
/*
object(Extender)#1 (3) {
  ["one"]=>
  int(333)
  ["two":"Base":private]=>      -- разные переменные здесь
  int(222)
  ["two":"Extender":private]=>  -- и здесь
  int(444)
}
*/
?>


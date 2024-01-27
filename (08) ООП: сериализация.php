<?php
//!---- (PHP): ООП: Сериализация:

/*
    по умолчанию объекты сериализуются 
    преобразованием переменных в строку
    через __toString 
    поэтому если преобразования не будет
    и переменной не будет
*/

//? One::
class One
{
    private $data = "внутренние данные";
    public function print() {echo $this->data.PHP_EOL;}

} //c:One

//? Obj::
class Obj
{
    private $data = "внутренние данные";

    function serialize() {return serialize($this->data);}
    function unserialize($pdata) {$this->data = unserialize($pdata);}

}//c:Obj

//* стандартная:
$b = new stdClass;
$b->a = [1,2,3];
$b = serialize($b); // standard
print_r($b); echo PHP_EOL;
$b = unserialize($b);

//* без кастомных функций:
$one = new One();
$s = serialize($one);
print_r($s); echo PHP_EOL;
$s = unserialize($s);
$s->print();

//* с кастомными функциями:
$a = new OBJ;
$s = serialize($a); // Obj::
$a = unserialize($s);

?>


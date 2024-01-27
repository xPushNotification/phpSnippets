<?php
//!---- (PHP): OOП: Клонирование:

/*
    так как объекты копируются по ссылке,
    для создания реальной копии объекта потребуется 
    его "клонирование"

    однако, если внутри объекта содержатся
    ссылки на другие объекты
    потребуется "клонировать" и их
    (глубокое клонирование)
*/

class Inner
{
    public $data = 111;
    public function __construct($pdata) {$this->data = $pdata;}
}
class Outer 
{
    public $objOne;
    public $objTwo;
    public function __construct($poneData, $ptwoData)
    {
        $this->objOne = new Inner($poneData);
        $this->objTwo = new Inner($ptwoData);
    }
    //* поддержка глубокого клонирования:
    public function __clone()
    {
        $this->objOne = clone $this->objOne;
        $this->objTwo = clone $this->objTwo;
    }
}

// создаем объект и его копию:
$outerObjOne = new Outer(111,222);
$outerObjTwo = clone $outerObjOne;

// изменяем оригинал:
$outerObjOne->objOne->data = 333;
$outerObjOne->objTwo->data = 444;

// проверяем, что объекты полностью разные:
// (без метода __clone будут одинаковые)
var_dump($outerObjOne);
var_dump($outerObjTwo);

?>


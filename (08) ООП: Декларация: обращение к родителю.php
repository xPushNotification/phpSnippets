<?php
//!---- (PHP): OOП: Декларация: Обращение к Родителю:

//? Base::
class Base
{
    private $data = "111";
    public function __construct($pdata){$this->data = $pdata;}
    public function __destruct(){}
    public function getData(){return $this->data;}

} //c:Base

//? One::
class One extends Base
{
    public function __consruct($pdata)
    {
        parent::__construct($pdata);
    }
    public function __destruct()
    {
        parent::__destruct();
    }
    public function getData()
    {
        // переменная родителя не модифицируется
        // инструкция просто добавляет переменную в ЭТОТ класс        
        $this->data = "111";

        return parent::getData();
    }

} //c:One

$one = new One("string to data init");
echo $one->getData();         // string to data init

?>


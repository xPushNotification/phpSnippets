<?php
//!---- (PHP): OOП: Доступ у Агрегируемых к "private" Членам Агрегатора:

/*
    Приватные данные можно отправить с одного класса 
    в другой по ссылке, в этом случае 
    они потеряют защиту.
    (доступ из агригируемого в агрегатор)
*/

//? TheVariable::
class TheVariable
{
    public $data = null;

    public function doChangePrivateData(&$pdata)
    {
        $this->data = &$pdata;
        $this->data = 777;
    }

} //c:TheVariable

class TheModel
{
    private $data = null;
    public function __construct()
    {
        $var = new TheVariable();

        // отправка приватных данных в другой класс:
        $var->doChangePrivateData($this->data);

        echo $this->data.PHP_EOL;
    }

} //c:TheModel

$model = new TheModel();

?>


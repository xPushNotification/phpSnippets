<?php
//!---- (PHP): OOП: Декларация: Readonly Свойства:

//? Status::
class Status 
{
    public $data = "the data";

} //c:Status

//? One::
class One
{
    // будет заблокирована только попытка изменения свойства
    // но не его внутренние состояния:
    public readonly Status $status;

    public function __construct(Status $status)
    {
        $this->status = $status;
    }

} //c:One

$one = new One(new Status);
echo $one->status->data.PHP_EOL;

$one->status->data = "the new data";
echo $one->status->data.PHP_EOL;  // ok

$one->status = new Status();      // error "can't modify"
?>


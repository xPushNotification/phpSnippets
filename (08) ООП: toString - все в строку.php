<?php
//!---- (PHP): OOП: toString - Всё в Строку:

//? One::
class One
{
    public $one = 111;
    public $two = 222;

    public function __toString()
    {
        return $this->one.":".$this->two.PHP_EOL;
    }

} //c:One

$one = new One();
echo "this is the one:".$one;

?>


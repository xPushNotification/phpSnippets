<?php
//!---- (PHP): OOП: Декларация: Переменные и Методы:

//? Inner::
class Inner
{}

//? One::
class One
{
    const           CC = "cc";   // без $ / всегда как static w::
    static          $d = "d";

    public string   $a;          // кто угодно
    private         $_c;         // только этот класс
    protected       $_b = "b";   // этот класс + extends

    public          $obj;
    public Inner    $in;        // auto __constructor

    public function __construct()
    {
        //* можно добавлять переменные по ходу:
        $this->newVariable = "555";

        //* обращение к статике через self:: или объект:
        $r = 
        [
            self::$d,
            self::CC,
            static::CC,        // аналогично self:: 
            One::$d,           // класс видит себя
        ];
        print_r($r);
        print_r($this);
    }

    public function __destruct()
    {
        echo "destructed".PHP_EOL;
    }

} //c:One

$one = new One();
//unset($one);      // форсированно уничтожить объект

echo (new One())::CC, PHP_EOL;    // статические переменные доступны и через объект
echo $one::CC, PHP_EOL;
echo "end of programm", PHP_EOL;

// без unset $one объект автоматически уничтожится здесь
?>


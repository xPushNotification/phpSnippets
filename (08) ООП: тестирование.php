<?php
//!---- (PHP): OOП: Тестирование:

//? One::
class One
{
    public function doOne(){}
    public function doTwo(){}

} //c:One

/*
    Так как в CLI может запустить технически
    любой файл 
    желательно тесты классов разместить 
    сразу же в том же файле - что и сам класс

    ОБЯЗАТЕЛЬНО подписывать название теста.
    переменную для режима тестов вводить НЕ НУЖНО
    статические функции для тестов вводить НЕ НУЖНО
    каждый тест должен активироваться отдельно
*/
if(1 && "OOP:name of the test")
{
    $one = new One();
    $one->doOne();
    $one->doTwo();

    $clone = clone $one;

    $stored = serialize($clone);
    var_dump($stored);
    $restored = unserialize($stored);    
}

?>


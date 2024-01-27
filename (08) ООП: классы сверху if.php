<?php
//!---- (PHP): OOП: Классы Сверху If:

/*
    декларация классов всегда происходит
    на верхнем уровне файла,
    и классы вложенные в if() ветви
    переместятся из них наверх:
*/

class Base1{}

if(1)
{
    class ExtenderBase1 extends Base1{}
}

if(1)
{
    // так как класс объявляется на верхнем уровне 
    // здесь к его декларации есть доступ:
    class Extender1Base1 extends ExtenderBase1{}
}

if(1)
{
    // здесь будет ошибка ExtenderBase1 уже объявлен
    // class ExtenderBase1 extends Base1 {}
}


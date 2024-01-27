<?php
//!---- (PHP): Обработка Ошибок: Исключения:
/*
    механика программирования должна быть устроена так
    чтобы контроль алгоритма выполнялся не исплючениями
    а проверкою данных на шагах.

    цель же исключений - одна - полностью подавлять 
    любого рода ошибки, которые могли бы дойти до пользователя.
*/

class Exc1 extends Exception {}
class Exc2 extends Exception {}
try
{
    throw new Exc1("Validation error");
}
catch(Exc1 $e)
{
    echo $e->getMessage();
}
catch(Exception $e) {}
catch(Exc1 | Exc2 $e)
{
    echo "caught:".get_class($e);
    switch(get_class($e)) {}
}
finally
{
    echo "finally";
}

// блок finally вызовется даже в несовсем логичных ситуациях:
function test()
{
    try
    {
        echo "one".PHP_EOL;
        return;
        echo "two".PHP_EOL;
    }
    catch(Exception $e)
    {}
    finally         // будет вызван игнорируя return
    {
        echo "finally!".PHP_EOL;
    }
}
test();  // one / finally!

?>


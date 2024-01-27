<?php
//!---- (PHP): OOП: Closures (динамический объект):
/*
    все классы в системе являются 
    производными от stdClass
    и позволяют динамически добавлять к себе свойства
*/

class BClass extends stdClass {}

$a = new BClass();
$a = new BClass;

$a->prop = 100;     // добавить свойство

$b = $a;            // копия по ссылке
$c = clone $a;      // копия по значению 

if($b instanceof BClass)
if($b instanceof stdClass)
{
    echo "true";
}
?>


<?php
//!---- (PHP): SPL: Heap (значение родителя > значение ребенка):
//? HEAP::
class HEAP extends SplHeap
{
    // правило для исключения дубликатов:
    function compare($a, $b) {return $a <=> $b;}

}//c:HEAP

$heap = new HEAP;
$heap->insert(10);
$heap->insert(100);
$heap->insert(5);       // 100,10,5

//* итерация без удаления:
foreach($heap as $k=>$v) {echo $v.PHP_EOL;}

//* итерация с выбросом элементов:
while($heap->valid())
{
    echo $heap->current().PHP_EOL;
    $heap->next();  // drop
}

?>


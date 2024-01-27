<?php
//!---- (PHP): SPL: Stack:

$stk = new SplStack;

$stk->push(5);
$stk[] = 4;
$stk->push(3);
$stk->add(1,100);       // index,value

$stk->pop();

foreach($stk as $k=>$v) {echo "$k => $v".PHP_EOL;}
?>


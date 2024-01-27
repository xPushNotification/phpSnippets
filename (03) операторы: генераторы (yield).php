<?php
//!---- (PHP): Генераторы:

function generator()  // генераторы не функции (не нужно глагольное)
{
    $times = 3;
    for($i=0; $i<10; $i++)
    {
        if($times-- == 0) return; // прервать последовательность
        yield $i;   // 0,1,2,3,... -- внутри есть yield? это генератор!
    }
    return "никогда не случиться";
}

$out = "";
foreach(generator() as $number)   // генератор итерируем
{
    $out .= $number.",";          // 0,1,2,
}
if(strlen($out))
{
    $out = substr_replace($out,"",-1);  // удалить хвост
}
echo $out, PHP_EOL;

// по сути генератор возвращает объект, который можно промотать назад, 
// а при вызове в foreach генератора - создается безымянный объект

echo "-----------".PHP_EOL;
$out = "";
$gen = generator();
$gen->rewind();

foreach($gen as $number)
{
    $out .= $number.".";
}
echo $out, PHP_EOL;

?>


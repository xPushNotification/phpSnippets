<?php
//!---- (PHP): Хеш:

$data = "hello";

//* доступные алгоритмы:
foreach (hash_algos() as $v)
{
    $r = hash($v, $data, false);
    printf("%-12s %3d %s\n", $v, strlen($r), $r);
}

// sha256:
$str = "---";
$testHash = "---";

//         <- выбранный алгоритм
$r = hash("sha256", $str, false);

if($testHash == $r){}

// гипотетически можно использовать хеш для генерации уникальных айди
// но это плохая идея, будут повторы
$i = 10;
while($i--)
{
 $randomId = hash("sha256", microtime(true));
 echo $randomId.PHP_EOL;
}

?>


<?php
//!---- (PHP): Время Выполнения Скрипта:

/*
    в реальности время исполнения отдельно 
    взятых скриптов лучше тестировать в CLI 
    режиме исполнения - по каждому отдельному 
    микроконтроллеру отдельно
*/

$contime=microtime(true);

print_r([1,2,3]);
sleep(1);

$contime= (microtime(true)-$contime);
$contime = sprintf("%.2f", $contime);

echo $contime;


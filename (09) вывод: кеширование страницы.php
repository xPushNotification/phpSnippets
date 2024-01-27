<?php
//!---- (PHP): Вывод: Вывод Страницы / Логика Кеширования:

/*
    Логика кеширования начинается с понимания правила:
    не нужно ничего на странице выводить, до тех пор пока вывод не сформирован
    (это займет больше памяти - но даст нам больше возможностей,
    а скоростью вывода займется как раз кеш).

    Логика вывода страницы:
    0. Если страница уже закеширована 
        условия кеша удовлетворяют - выводим кеш

    1. Сформировали данные
        $data = [];
        $data["cards"] = [];
        $data["cards"][] = ["name"=>$name, "descr"=>$descr];

    2. произвели вывод с помощью шаблона, отправив в него данные:
        $output = [];
        $output["header"] = $tplContent($data);
        $output["footer"] = $tplContent($data);

    3. Сделали вывод в буфер (сбросив данные)

    4. Если страница не закеширована - закешировали буфер

    5. производим вывод страницы с кеша
*/

//! Модель страницы:
// ---------------------------------
class CFG_CACHING 
{
    const lifetime = 120;
    const name = "cache/file.html";
}

$cacheFile = (object)
[
    "lifetime" => CFG_CACHING::lifetime,
    "name" => CFG_CACHING::name,
    "exists" => false,
];
$cacheFile->exists
    = is_readable($cacheFile->name);

$page = (object)
[
    "data" => [],
    "output" => [],
];    

//! Вывод кеша, если есть и выход:
// ---------------------------------
if($cacheFile->exists)
{
    $cacheLivedTime
        = time() - filemtime($cacheFile->name);   // m: [m]odification

    if($cacheLivedTime < $cache->lifetime)
    {
        //ob_start();
        //$content = ob_get_clean();
        file_put_contents($cacheFile->name, $content);
        exit;
    }
}

//! Форирование данных:
// ---------------------------------
// ...
$page->data = [1,2,3];

//! Вывод данных с помощью шаблона:
// ---------------------------------
// ...
$page->output = $page->data[0]."".$page->data[1];

unset($page->data);     // очищаем память

//! Формирование буфера:
// ---------------------------------
/*
    да, на этот момент существуют и данные с $page->output
    и $bufferedHtml - но это по логике РАЗНЫЕ 
    данные для отладки - поэтому они хранятся какое то время вместе
*/
ob_start();
echo $page->output;
$bufferedHtml = ob_get_clean();

unset($page->output);  // очищаем память

//! Кеширование буфера (очевидно если сюда дошли оно нужно):
// ---------------------------------
$handle = fopen($cache->filename, "w");
fwrite($handle, $bufferedHtml);
fclose($handle);

//! Вывод страницы с кеша:
// ---------------------------------
echo $bufferedHtml;
exit;

?>


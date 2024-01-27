<?php
//!---- (PHP): Вывод: Функция-Шаблон:
/*
    Заметьте, для вывода функции не нужны echo,
    достаточно выйти из процедур php внутри файла:
    ?>..здесь вывод..<?php

    Функция-Шаблон всегда имеет внутри себя:
        $pparams["to_cache"] = yes|no    -- выводиться ли с кеша
        $pparams["to_buffer"] = yes|no   -- выводиться ли в буфер
        $pparams["result"]               -- сохраненный буфер
*/
$createLink = function(array &$pparams)  // отмечаем ссылку
{
    $pparams["result"] = "";

    $url = "/";
    $name = " ";
    $toBuffer = "no";
    $toCache = "no";

    if(isset($pparams["url"])) if(gettype($pparams["url"]) == "string") $url = $pparams["url"];
    if(isset($pparams["name"])) if(gettype($pparams["name"]) == "string") $url = $pparams["name"];
    if(isset($pparams["to_buffer"])) if($pparams["to_buffer"] == "yes") $toBuffer = "yes";
    if(isset($pparams["to_cache"])) if($pparams["to_cache"] == "yes") $toCache = "yes";

    if($toCache == "yes") {}

    if($toBuffer == "yes") {ob_start();}
//// ---- >>>>
/* HTML */?>
<a href='<?=$url?>'><?=$name?></a>
<?php
//// ---- <<<<
    if($toBuffer == "yes")
    {
        $pparams["result"] = ob_get_contents();
        ob_end_clean();
    }

}; // f:createLink

//* Логика работы внутри шаблона:
if("createLink")       //? имя функции вывода
{
    // данные, как понимаем, передает контроллер:
    $p =
    [
        "url"=>"https://yandex.ru",
        "name"=>"search",
    ];
    $createLink($p);
    echo $p["result"];  //? результаты вывода
}

?>


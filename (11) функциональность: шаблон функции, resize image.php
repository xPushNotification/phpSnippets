<?php
//!---- (PHP): Изображения: Изменение Размера Картинки (шаблон функции)

if(!isset($GLOBALS["funcs"])) {$GLOBALS["funcs"] = [];}
$GLOBALS["funcs"]["resizeImageFile"] = function(array $pparams = [])
{
/*
  внутри функции конфигурация не нужна
  в случае - если данные - которыми оперирует
  функция - исключительно дефолты её самой,
  и не связаны с чем то внешним (смысл конфигурации связывать
  несколько объектов через внешние данные)
*/

    $filename   = "";
    $savename   = "";
    $maxwidth   = 120;      $maxwidthmin = 1;       $maxwidthmax = 3000;
    $maxheight  = 120;      $maxheightmin = 1;      $maxheightmax = 3000;
    $quality    = 100;      $qualitysmall = 0;      $qualitymax = 100;

/*
  огромный блок установки значений 
  однако его можно избежать если оперировать 
  TheModel
*/
    if(!isset($pparams["filename"])) {return;}    if(gettype($pparams["filename"]) != "string") {return;}    if(!file_exists($pparams["filename"])) {return;}
    if(!isset($pparams["savename"])) {return;}    if(gettype($pparams["savename"]) != "string") {return;}

    if(!isset($pparams["maxwidth"])) {$pparams["maxwidth"] = $maxwidth;}
    if(gettype($pparams["maxwidth"]) != "integer") {return;}
    if($pparams["maxwidth"] <= $maxwidthmin || $pparams["maxwidth"] >= $maxwidthmax) {return;}

    if(!isset($pparams["maxheight"])) {$pparams["maxheight"] = $maxheight;}
    if(gettype($pparams["maxheight"]) != "integer") {return;}
    if($pparams["maxheight"] <= $maxheightmin || $pparams["maxheight"] >= $maxheightmax) {return;}

    if(!isset($pparams["quality"])) {$pparams["quality"] = $quality;}
    if(gettype($pparams["quality"]) != "integer") {return;}
    if($pparams["quality"] <= $qualitysmall || $pparams["quality"] >= $qualitymax) {return;}

/*
  ввод функции на этом этапе проверен
  теперь можно установить внутренние переменные 
  с которыми функция в реальности будет работать
*/

    $fn = $filename  = $pparams["filename"];
    $sn = $savename  = $pparams["savename"];
    $mw = $maxwidth  = $pparams["maxwidth"];
    $mh = $maxheight = $pparams["maxheight"];
    $ql = $quality   = $pparams["quality"];

/*
  на этом этапе мы дошли до ситуации 
  в которой переменные или default или 
  проверены с внешнего ввода, 
  таким образом можно выполнить алгоритм безопасно
  
  на этом этапе вставлять блоки try/catch уже бесполезно
  функция, предполагается, должна отработать в любом 
  случае вне зависимости от ввода пользователя.
*/

    $source = imagecreatefromjpeg($fn);
    list($w, $h) = getimagesize($fn);
    $aspect_ratio = $w/$h;

    if($mw/$mh > $aspect_ratio)     {$mw = $mh * $aspect_ratio;}
    else                            {$mh = $mw / $aspect_ratio;}

    $image_p = imagecreatetruecolor($mw, $mh);

    imagecopyresampled(
        $image_p, $source,
        0,0,0,0,
        $mw, $mh, $w, $h
    );

    imagejpeg($image_p, $sn, $ql);

    unset($image_p);

}; //f:resizeImageFile

//* использование:
$GLOBALS["funcs"]["resizeImageFile"](["filename" => "from1.jpg", "savename" => "to1.jpg"]);
?>


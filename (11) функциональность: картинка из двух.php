
<?php
//!---- (PHP): Генерация Изображения из Двух:
/*
  там где код оперирует объектами
  в рамках одного блока контроллера
  не нужно городить классы - это как раз
  сценарий использования объектов

  для работы с изображениями
  imagecreatefrompng/jpeg - нужно расширение
*/

//* Модель:
//? Связанные данные всегда представляются объектом:
$d = $destination = (object)
[
    "filename" => "vinyl.png",
    "handler"  => null,
    "x"        => 0,
    "y"        => 0,
    "height"   => 180,
    "width"    => 180,
    "pct"      => 100,  // 0->100 (100 imagecopy)
];

//? Класс в большинстве случаев не нужн:
$s = $source = (object)
[
    "filename" => "cover.jpg",
    "handler"  => null,
    "x"        => 0,
    "y"        => 0,
    "height"   => 180,
    "width"    => 180,
    "pct"      => 100,
];

//* Контроллер:
$destination->handler = imagecreatefrompng($d->filename);
$source->handler      = imagecreatefromjpeg($s->filename);

imagealphablending($d->handler, false);
imagesavealpha($d->handler, true);

imagecopymerge(
    $d->handler, $s->handler,
    $d->x, $d->y,
    $s->x, $s->y,
    $s->width, $s->height,
    $s->pct
);

//* Вывод:
header("Content-Type: image/png");
imagepng($destination->handler);

imagedestroy($d->handler);
imagedestroy($s->handler);

?>


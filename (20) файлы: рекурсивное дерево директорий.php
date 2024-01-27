<?php
//!---- (PHP): Файлы: Рекурсивный Обход Директории:

/*
    при большой вложенности может тормозить
    учитывайте также что PHP работает под учеткою 
    которая не имеет прав доступа уровня пользователя
    (foreach может получить не файл, а ошибку)
*/

function getDirToArray($pparams)
{
    $result = [];
    $nameOfDirectory = "";

    if(!isset($pparams["nameOfDirectory"])) return $result;
    if(gettype($pparams["nameOfDirectory"]) != "string") return $result;
    if(!is_dir($pparams["nameOfDirectory"])) return $result;

    $nameOfDirectory = $pparams["nameOfDirectory"];

    $directoryCurrent = scandir($nameOfDirectory);

    //* при нарушении прав здесь будет ошибка
    foreach($directoryCurrent as $filename)
    {
        $fn = $filename;

        if(!in_array($fn, [".", ".."]))
        {
            if(is_dir($nameOfDirectory.DIRECTORY_SEPARATOR.$fn))
            {
                $p = [];
                $p["nameOfDirectory"] = $nameOfDirectory.DIRECTORY_SEPARATOR.$fn;
                $result[$fn] = getDirToArray($p);
            }
            else
            {
                $result[] = $fn;
            }
        }
    }

    return $result;

} //f:getDirToArray

$r = [];
$r = getDirToArray(["nameOfDirectory" => "/var/www/"]);
print_r($r);
?>


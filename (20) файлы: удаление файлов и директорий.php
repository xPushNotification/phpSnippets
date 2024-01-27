
<?php
//!---- (PHP): Файлы: Удаление Файлов и Директорий:

$filename = "/path/to/file.txt";
if(file_exists($filename))
{
    $success = unlink($filename);
    if(!$success) throw new Exception("cannot delete a file");
}
?>


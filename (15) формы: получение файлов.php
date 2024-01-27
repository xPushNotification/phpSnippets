<?php
//!---- (PHP): Формы: Загрузка Файлов:
////---->>>>
/*--HTML--*/?>
<form method="post" enctype="multipart/form-data">

    <input type='file' name="nameoffile"/>
    <input type='file' name="filesarray[]" multiple="multiple"/>

    <input type="submit" name="ok" />
</form>
<?php
////----<<<<
$upfiles = (object)
[
    "storeplace" => "/var/temp/myfiles",
    "informname" => "nameoffile",
    "filesarray" => "filesarray",
    "total" => 0,
];

if(!file_exists($upfiles->storeplace)) {mkdir($upfiles->storeplace);}

//* Один файл:
if($_FILES[$upfiles->informname]["error"] != UPLOAD_ERR_OK) exit;
$basename = basename($_FILES[$upfiles->informname]["name"]);
move_uploaded_file(
    $_FILES[$upfiles->informname]["tmp_name"],
    $upfiles->storeplace."/".$basename
);

//* Несколько файлов:
$upfiles->total = count($_POST[$upfiles->filesarray]["name"]);
for($i=0; $i<$upfiles->total; $i++)
{
    if($_FILES[$upfiles->filesarray]["error"][$i] == UPLOAD_ERR_OK)
    {
        $basename = basename($_FILES[$upfiles->filesarray]["name"][$i]);

        move_uploaded_file(
            $_FILES[$upfiles->filesarray]["tmp_name"][$i],
            $upfiles->storeplace."/".$basename
        );
    }
}//for:
?>


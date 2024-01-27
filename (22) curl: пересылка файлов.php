<?php
//!---- (PHP): cURL: Пересылка Файлов:
$post_data =
[
    "first_name"    => "John",
    "last_name"     => "Doe",
    "activities[0]" => "soccer",    // $_POST работает с таким форматом данных
    "activities[1]" => "hiking",
];

//* Создаем CurlFile объекты для загружаемых файлов:
$files = [];
$upfiles = &$_FILES["upload"];

foreach($upfiles["error"] as $key=>$error)
{
    if($error == UPLOAD_ERR_OK)
    {
        $files["upload[$key]"]      // <- CurlFile
            = curl_file_create(
                $upfiles["tmp_name"][$key],
                $upfiles["type"][$key],
                $upfiles["name"][$key]
            );
    }
}
$data = $post_data + $files;

//* Шлем комбинированный запрос:
$cfg_curl =
[
    CURLOPT_POST            => 1,
    CURLOPT_URL             => "https://api.externalserver.com/upload.php",
    CURLOPT_RETURNTRANSFER  => true,
    CURLINFO_HEADER_OUT     => 1,
    CURLOPT_POSTFIELDS      => $data
];

$ch = curl_init();
curl_setopt_array($ch, $cfg_curl);
$result = curl_exec($ch);
curl_close($ch);
?>


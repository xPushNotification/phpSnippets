<?php
//!---- (PHP): cURL: Отправка Хедеров:

//? всегда нужно использовать именно этот подход:
$cfg_curl =
[
    CURLOPT_HTTPHEADER      => ["X-User: admin", "X-Authorization: 123456"],
    CURLOPT_RETURNTRANSFER  => true,
    CURLOPT_VERBOSE         => 1,   // информация отладки
    CURLOPT_URL             => "https://example.com",
];

$ch = curl_init();
curl_setopt_array($ch, $cfg_curl);
$result = curl_exec($ch);
curl_close($ch);
?>


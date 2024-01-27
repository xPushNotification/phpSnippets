<?php
//!---- (PHP): cURL: Обычный Запрос:
////---->>>>
/*
    Процесс запроса:
        curl_init
        curl_setopt_array | curl_setopt
        result = curl_exec /sync
        curl_close

    Лучше всего использовать 
    с HTML парсером:
        $doc = DOMDocument; $doc->loadHTML($content);
        $json = json_decode($content, true, 1);
*/
////----<<<<
$cfg_curl =
[
    CURLOPT_URL => "https://example.com",
    CURLOPT_RETURNTRANSFER => true,
];

$curl_header = $ch
    = curl_init();
curl_setopt_array($ch, $cfg_curl);
$response = curl_exec($ch);
curl_close($ch);

?>


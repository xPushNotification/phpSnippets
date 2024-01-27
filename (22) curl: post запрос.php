<?php
//!---- (PHP): cURL: POST Запрос:
$post =
[
    "a" => "111",
    "b" => "222",
];

$cfg_curl =
[
    CURLOPT_URL => "https://example.com",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_POSTFIELDS => $post,
];

$ch = curl_init();
curl_setopt_array($ch, $cfg_curl);
$response = curl_exec($ch);
curl_close($ch);
?>


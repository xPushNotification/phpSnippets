<?php
//!---- (PHP): cURL: DELETE Запрос:
$cfg_curl =
[
    CURLOPT_URL => "https://example.com",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_CUSTOMREQUEST => "DELETE",
];

$ch = curl_init();
curl_setopt_array($ch, $cfg_curl);
$result = curl_exec($ch);
curl_close($ch);
?>


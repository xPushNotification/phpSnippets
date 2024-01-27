
<?php
//!---- (PHP): cURL: Логин с Использованием Кук:
////---->>>>
/*
    -. ассоциируем файл кук с curl
    -. шлем запрос get и получаем куки
    -. используем эти куки для авторизации во втором запросе
*/
////----<<<<
//* ассоциированный куки файл:
$cookie_file = "/tmp/cookie.txt";
$ch = curl_init();
curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie_file);
curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie_file);

//* первый запрос:
$cfg_cridentials = (object)
[
    "username" => "joe",
    "password" => "pas",
];

curl_setopt($ch, CURLOPT_URL, "https://example.com/login.php");
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $cfg_cridentials);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$result = curl_exec($ch);       // cookies have saved

//* второй запрос:
curl_setopt($ch, CURLOPT_URL, "https://example.com/page_with_auth.php");
curl_setopt($ch, CURLOPT_HTTPGET, true);
$result = curl_exec($ch);

//* очистка:
curl_close($ch);
?>


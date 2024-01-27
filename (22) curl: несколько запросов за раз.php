<?php
//!---- (PHP): cURL: Множество Запросов Одновременно:

//* Модель:
class CurlHandler
{
    //* init:
    var $post_fields;
    var $url;
    var $handler;

    //* errors:
    var $errors = [];

    //* result:
    var $last_URL;
    var $time;
    var $response;

    //* constructor:
    function __construct($pparams)
    {
        $this->post_fields = $pparams["post_fields"] ?? [];
        $this->url         = $pparams["url"] ?? "";

    }//m:

}//c:CurlHandler

//* Данные:
$curls = [];
$multihandler = null;

$curls[] = new CurlHandler([
    "url"=> "example1.com",
    "post_fields"=> ["a"=>"111", "b"=>"222",]
]);
$curls[] = new CurlHandler([
    "url"=> "example2.com",
    "post_fields"=> ["a"=>"333", "b"=>"444",]
]);

//* Инициализация:
$multihandler
    = curl_multi_init();

//* setup для каждого curl элемента:
foreach($curls as &$curl)
{
    $curl->handler = curl_init($curl->url);

    $cfg_curl =
    [
        CURLOPT_POST            => true,
        CURLOPT_RETURNTRANSFER  => true,
        CURLOPT_POSTFIELDS      => $curl->post_fields,
    ];
    curl_setopt_array($curl->handler, $cfg_curl);

    curl_multi_add_handle($multihandler, $curl->handler);

}//foreach:

//* отправляем запросы:
$running = null;
do
{
    curl_multi_exec($multihandler, $running);       // ждем исполнения ВСЕХ
}
while($running);

//* получаем результаты / формируем ошибки:
foreach($curls as &$curl)
{
    $curl->errors[] = curl_error($curl->handler);
    $curl->last_URL = curl_getinfo($curl->handler, CURLINFO_EFFECTIVE_URL);
    $curl->time     = curl_getinfo($curl->handler, CURLINFO_TOTAL_TIME);
    $curl->response = curl_multi_getcontent($curl->handler);
}

//* ошибки:
foreach($curls as &$curl)
{
    if(count($curl->errors))
    foreach($curl->errors as $e)
    {
        throw new Exception("{$curl->url}: has provided: {$e}");
    }
}

//* debug:
var_dump($curls);

//* очистка:
foreach($curls as &$curl)
{
    curl_multi_remove_handle($multihandler, $curl->handler);
}

?>


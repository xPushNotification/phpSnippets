<?php
//!---- (PHP-HTACCESS): Cross Origin (XSS - cross site scripting):
// хедер показывает, что страница может быть запрошена с любого адреса

header("Access-Control-Allow-Origin: *");
////---->>>>
/*
разрешить xss только с адресов: google.com|yandex.ru|site.ru
начинающихся и с http и с https, начинающихся с www. или без него

from .htaccess (mod_headers must be enabled):
<IfModule mod_headers.c>
    SetEnvIf Origin "http(s)?://(www\.)?(google.com|yandex.ru|site.ru)$" AccessControlAllowOrigin=$0
    Header add Access-Control-Allow-Origin %{AccessControlAllowOrigin}e env=AccessControlAllowOrigin
    Header merge Vary Origin
</IfModule>
*/
////----<<<<
?>


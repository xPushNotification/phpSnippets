<?php
//!---- (PHP-HTACCESS): Разметка Эндпоинтов (псевдоадресов, виртуальных путей):
////---->>>>
/*

с адреса:
site.ru/categoryName/taxonomyName/
создать запрос:
site.ru/index.php?catname=categoryName&taxname=taxonomyName

RewriteEngine On    # Turn on the rewriting engine
RewriteCond %{REQUEST_FILENAME} !-d
RewriteCond %{REQUEST_FILENAME} !-f
RewriteRule    ^t/([^/]*)/$             t/index.php?catname=$1    [L]                #category/
RewriteRule    ^t/([^/]+)/([^/]+)/*$    t/index.php?catname=$1&taxname=$2    [L]     #category/name
*/
////----<<<<

?>


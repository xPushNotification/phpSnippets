<?php
//!---- (PHP): Вывод: Формат: CSS:

/*
    php это же препроцессор
    поэтому его удобно использовать для формирования CSS
    к тому же CSS обычно кешируется браузером
*/

//* style.css.php
header("Content-Type: text/css");
////---->>>>
/*--CSS--*/?>
body{background:red;}
a{color:orange;}
<?php
////----<<<<
exit;

//* page.html.php:
////---->>>>
/*--HTML--*/?>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="style.css.php">
    </head>
    <body></body>
</html>
<?php
////----<<<<
exit;

?>


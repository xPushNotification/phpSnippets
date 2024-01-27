
<?php
//!---- (PHP): Вывод: Буффер с Middleware /глобальная адресация функций:

/*
    middleware - она же callback, сработает 
    по отношению к буфферу как только туда что либо
    будет размещено (по сути это окономия одной 
    строчки кода и делание его непрогнозируемым).
*/

function middleware(string $pbuffer)
{
    return str_replace(
        ["\n", "\t", " "],
        "",
        $pbuffer
    );
                            // <- последний "" обязательно
} // f: middleware

$the_middleware = function (string $pbuffer)
{
    return middleware($pbuffer);

}; //f: the_middleware

if("use globals"):
    ob_start("middleware");
else:
    ob_start($the_middleware);
endif;
////---->>>>
/*--HTML--*/?>
This is
the content
<?php
////----<<<<
$content = ob_get_contents();
ob_end_flush();
?>


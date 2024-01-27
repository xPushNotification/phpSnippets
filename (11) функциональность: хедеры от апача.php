<?php
//!---- (PHP): Apache: Смотрим Все Заголовки:
/*
    CLI работает, естественно, минуя апач.
*/

print_r(
    apache_request_headers()
);

?>


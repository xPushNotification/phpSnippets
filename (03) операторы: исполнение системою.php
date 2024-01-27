<?php
//!---- (PHP): Shell Команды из Кода (отключить!):

/*
  php.ini:

  # безопасность (не работает в CLI):
  # список функция для отключения глобально:

  disable_functions =exec,passthru,shell_exec,system,proc_open,popen,show_source
  allow_url_include=Off

*/
echo `whoami`;
?>


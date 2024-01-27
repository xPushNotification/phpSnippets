<?php
//!---- (PHP): Never Return Синтаксис:

function redirect(string $puri): never 
{
    header('Location: ' . $puri);
    exit();
}

function redirectToLoginPage(): never 
{
    redirect('/login'); // функция с never 
    echo 'Hello';       // <- интерпретатор определит как "dead code"
}

?>


<?php
//!---- (PHP): Получение IP Клиента:

function getClientIP($pparams = [])
{
    $proxiesTrusted = ["2001:db8::1", "192.168.50.1",];
    $headerOfProxie = "HTTP_X_FORWARDED_FOR";

    if(isset($pparams["proxiesTrusted"])) if(gettype($pparams["prixieTrusted"]) == "array") {$proxiesTrusted = $pparams["proxiesTrusted"];}

    if(in_array($_SERVER["REMOTE_ADDR"], $proxiesTrusted))
    if(array_key_exists($headerOfProxie, $_SERVER))
    {
        $explode = explode(",", $_SERVER[$headerOfProxie]);
        $endArr = end($explode);
        $clientIP = trim($endArr);

        return $clientIP;
    }

    return $_SERVER["REMOTE_ADDR"];

} // f:getClientIP


?>


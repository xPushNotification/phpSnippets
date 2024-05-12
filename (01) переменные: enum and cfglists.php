<?php
//!----(PHP) Enums -Vs- CfgLists:
/*
    энумераторы против 
    конфигурационных списков

    всего есть четыре сценария для списков:
    1. список значений - по которому осуществляется выбор автоматом где то в коде
       $possibleArray = TheCities::list;
       if(in_array($_POST["city"],$possibleArray)){}
       -----
    2. список значений - из которого в коде выборка делается руками
       и которые могут также использоваться по своему смыслу значений
       (-а-)
       doSomething(TheVariableType::VARCHAR)
       (-б-)
       doSomething("varchar")
       -----
    3. список значений с маппингом короткого значения в длинное
       TheMessage::WARNING == "this is the warning message"
       -----
    4. список значений которые не во что вообще никогда не превращаются
       и нужны только для кода (и вот здесь у нас ENUM):
       $message = MESSAGES::WARNING;
       if($message == MESSAGES::WARNING){}
       -----
*/

//* энумераторы:
enum YESNO
{
    case Yes;
    case No;
}

$p = function(YESNO $pstatus)
{
    if($pstatus == YESNO::Yes) {echo 111;}
    if($pstatus == YESNO::No) {echo 222;}
};

$p(YESNO::Yes);
$p(YESNO::No);
echo PHP_EOL;

//* конфигурационные списки:
// подразумевается, что файл будет лежать в "cfg.city.php"
class CityCfg
{
    const default = CityCfg::list[0];
    /*
        очевидно, если конфигурационный список содержит 
        чтото типа списка улиц, и используется для заполнения 
        базы данных - то нечего его изнчально использовать 
        в контроллерах - в виде конфигурационного списка

        поэтому в этих случаях оптимизация просто не нужна.
    */
    const list = 
    [
        "Moscow",
        "New York",
        "San Francisko",
    ];
}
echo CityCfg::default.PHP_EOL;

$p = function($pparams)
{
    // require_once("cfg.city.php");
    $city = CityCfg::default;       // мы сразу используем дефолтное
    
    if(isset($pparams["city"])) 
    if(in_array($pparams["city"], CityCfg::list)) 
    $city = $pparams["city"];

    echo $city;
    echo PHP_EOL;
};
$p(["city"=>"New York"]);           // очевидно что задвать параметр можно строкою

//* теперь перейдем к сообщениям (для которых строкою параметр не задашь).
//  логика строиться просто от того - что параметром приходит ключ от конфигурации:
class MessageCfg
{
    const default = MessageCfg::list["DEFAULT"];
    const list = 
    [
        "DEFAULT" => "",
        "ERROR" => "This is the error message",
        "WARNING" => "This is the warning message",
        "OK" => "This is the OK message",
    ];
 }
$p = function($pparams)
{
    $message = MessageCfg::default;
    $keys = array_keys(MessageCfg::list);

    if(isset($pparams["message"]))
    if(in_array($pparams["message"],$keys))
    $message = MessageCfg::list[$pparams["message"]];   // пришел то по сути ключ!

    echo $message;
    echo PHP_EOL;
};
$p(["message"=>"ERROR"]);

//* список с само-ключами решает проблему с выбором между константами и списком:
class TheVariableType
{
    // список!
    const list =
    [
        "enum" => "enum",
        "text" => "text",
    ];

    // константы!
    // не бедут само-ключей - инициализация будет не очевидной!
    const
        ENUM = self::list["enum"],
        TEXT = self::list["text"];

    // default!
    const default = self::list["enum"];
}
print_r(TheVariableType::list);
echo TheVariableType::ENUM, PHP_EOL;
echo TheVariableType::default, PHP_EOL;
print_r([
    in_array("text",TheVariableType::list),
]);
echo PHP_EOL;

//* The Variant from the Python:
class TheVariableType
{
 const
      ENUM = "enum",
      TEXT = "text",
      default = self::TEXT,
      list =
      [
        self::ENUM,
        self::TEXT,
      ];
}

$type = TheVariableType::ENUM;
echo $type,PHP_EOL;

print_r([
    in_array("text", TheVariableType::list),
    in_array("json", TheVariableType::list),
]);
///
?>


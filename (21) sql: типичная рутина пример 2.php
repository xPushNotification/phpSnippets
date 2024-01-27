<?php
//!---- (PHP): MySQLi:

//! конфигурации:
class CFG_DB_ROOT_ACCOUNT
{
    const login = "root";
    const password = "---";
}
class CFG_DB_NAMES
{
    const sqltests = "---";    // наша база для тестов
}
class CFG_DB_SERVERS
{
    const sqltests = "localhost";      // сервер для подключения
}

//! итоговая конфигурация:
$cfgs = (object)
[
    "username"  => CFG_DB_ROOT_ACCOUNT::login,
    "password"  => CFG_DB_ROOT_ACCOUNT::password,
    "db"        => CFG_DB_NAMES::sqltests,
    "server"    => CFG_DB_SERVERS::sqltests,
];
$db = (object)
[
    "connection" => null,
    "name" => $cfgs->db,
];
//print_r($cfgs);

//! подключаемся к базе данных:
$cridentials = (object) 
[
    "server"    => $cfgs->server,
    "username"  => $cfgs->username,
    "password"  => $cfgs->password,
];
//print_r($cridentials);

try
{
    $db->connection = new mysqli(
        $cridentials->server,
        $cridentials->username,
        $cridentials->password
    );
}
catch(EXCEPTION $e)
{
    echo "ошибка соединения".PHP_EOL;
    exit();
}

//! если нет базы данных - создаем её:
$q = "create database  if not exists `{$db->name}`";
$db->connection->query(
        $q,
        MYSQLI_USE_RESULT
); 

//! выбираем основную базу для работы:
$db->connection->select_db($db->name);

//! проверяем есть ли в базе таблицы:
$qShowTables = (object)
[
    "query" => "SHOW TABLES",
    "result" => null,
    "tables" => [],
];
$qShowTables->result = $db->connection->query(
    $qShowTables->query,
    MYSQLI_USE_RESULT
);

// result - не массив - а объект с которого можно получить одну строку
while($row = $qShowTables->result->fetch_assoc()) 
{
    foreach($row as $k=>$v)
    {
        $qShowTables->tables[] = $v;
    }   
}
//print_r($qShowTables->tables);

//! если в базе есть таблицы: удаляем их
$qDeleteTables = (object)
[
    "isDropTables" => "no",
    "tables" => &$qShowTables->tables,
    "query"  => function(string $ptable) {return "drop table `{$ptable}`";},
    "result" => null,    
];
if(count($qShowTables->tables) > 0) {$qDeleteTables->isDropTables = "yes";}
//print_r($qDeleteTables);

if($qDeleteTables->isDropTables == "yes")
{
    foreach($qShowTables->tables as $k=>$v)
    {
        $q = ($qDeleteTables->query)($v);
        $qDeleteTables->result = $db->connection->query(
            $q,
            MYSQLI_USE_RESULT
        );
    }    
}

?>


<?php
//!---- (PHP): MySQLi:
//* /cfgs/dbcridentials.cfg.php:
final class ConfigDBCridentials
{
    const
    SERVERNAME = "localhost",
    USERNAME   = "my_user",
    PASSWORD   = "---",
    DBNAME     = "my_db";

}//cfg:ConfigDBCridentials

//* controller_name.php:
//* через объект:
$conn = new mysqli(
    ConfigDBCridentials::SERVERNAME,
    ConfigDBCridentials::USERNAME,
    ConfigDBCridentials::PASSWORD
);

$conn->select_db(ConfigDBCridentials::DBNAME);

//? SQL выражения ВСЕГДА должны храниться внутри тела контроллера:
$result = $conn->query(
    "select * from city",
    MYSQLI_USE_RESULT
);

while($row = $result->fetch_assoc()) {var_dump($row);}

$conn->close();

//* процедурный подход:
$conn = mysqli_connect(
    ConfigDBCridentials::SERVERNAME,
    ConfigDBCridentials::USERNAME,
    ConfigDBCridentials::PASSWORD
);

mysqli_select_db($conn, ConfigDBCridentials::DBNAME);

// $result - не массив - а объект с которого можно получить одну строку
$result = mysqli_query(
    $conn,
    "select * from city",
    MYSQLI_USE_RESULT
);

while($row = mysqli_fetch_assoc($result))
{
    var_dump($row);
    echo "{$row['name']} : {$row['surname']}";  // column!
}

mysqli_close($conn);
?>


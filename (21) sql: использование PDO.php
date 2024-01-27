<?php
//!---- (PHP): SQL: PDO:

class CFG_PDO_READWRITE_CRIDENTIALS
{
    const
    server   = "localhost",
    db       = "tasksdb",
    username = "root",
    password = "---";

} // cfg:

class CFG_PDO_READ_CRIDENTIALS
{
    const
    server   = "localhost",
    db       = "tasksdb",
    username = "readonly",
    password = "---";

} // cfg:

try
{
    $conn = null;
    $cfg = new CFG_PDO_READ_CRIDENTIALS;

    $server     = $cfg::server;
    $db         = $cfg::db;
    $username   = $cfg::username;
    $password   = $cfg::password;

    //* соединение:
    $conn = new PDO(
        "mysql:host={$server};dbname={$db}; charset=utf-8",
        $username,
        $password
    );

    //* вставка:
    $q = $conn->prepare(
        "
        insert into tblusers
            (fullname, username, password)
            values
            (:fullname, :username, :password)
        "
    );
    $q->bindParam(":fullname", "fullname", PDO::PARAM_STR);
    $q->bindParam(":username", "username", PDO::PARAM_STR);
    $q->bindParam(":password", "password", PDO::PARAM_STR);
    $q->execute();
    //-eq (тут не указан тип параметра):
    $q->execute([
        ":fullname" => "fullname",
        ":username" => "username",
        ":password" => "password",
    ]);

    $rowCount     = $q->rowCount();
    $lastInsertId = $conn->lastInsertId();

    echo $rowCount.PHP_EOL;
    echo $lastInsertId;

    //* select:
    $q = $conn->prepare(
        "
        select
            id,
            title,
            description,
            DATE_FORMAT(deadline, '%d/%m/%Y %H:%i') as deadline,
            completed
        from tbltasks
            where
                id = :taskid
                and
                userid = :userid
        "
    );
    $q->bindParam(":taskid", 100, PDO::PARAM_INT);
    $q->bindParam(":userid", 101, PDO::PARAM_INT);
    $q->execute();

    $rowCount = $q->rowCount();

    while($row = $q->fetch(PDO::FETCH_ASSOC))
    {
        echo "{$row['id']}:{$row['title']}".PHP_EOL;
    }

    // можно отладить сразу весь выброс:
    var_dump($q->fetchAll());
    foreach($q->fetchAll() as $row)
    {
        var_dump($row["id"]);
    }

    //* update:
    $q = $conn->prepare(
        "
        update tbltasks
            set
            title = :title,
            description = :description,
            deadline = STR_TO_DATE(:deadline, '%d/%m/%Y %H:%i'),
            completed = :completed
                where
                    id = :taskid
                    and
                    userid = :userid
        "
    );
    $q->bindParam(":title",       "a", PDO::PARAM_STR);
    $q->bindParam(":description", "b", PDO::PARAM_STR);
    $q->bindParam(":deadline",  "29/12/2021 10:30", PDO::PARAM_STR);
    $q->bindParam(":completed", "yes",              PDO::PARAM_STR);
    $q->bindParam(":taskid",    101,                PDO::PARAM_INT);
    $q->bindParam(":userid",    102,                PDO::PARAM_INT);
    $q->execute();

    //* disconnect:
    $conn = null;       // __destruct will destroy connection

}
catch(Exception $e)
{
    echo $e->getMessage();
}

?>


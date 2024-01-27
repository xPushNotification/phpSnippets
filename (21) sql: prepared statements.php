<?php
//!---- (PHP): MySQLi: Prepared Statements:
$sql = "
    select
        column_1
        from tablename
        where
            column_2 = ?
            and
            column_3 = ?
";
//* oop:
$rows = [];
$stmt = $conn->prepare($sql);

//? i- integer, d- double, s- string, b- blob
//? si => первое это строка, второе integer
$stmt->bind_param("si", $column_2_value, $column_3_value);
$stmt->execute();

$result = $stmt->get_result();
if($result->num_rows === 0) {exit("no rows");}

while($row = $result->fetch_assoc())
{
    $rows[] =    // demonstration of the field names:
    [
        "id"   => $row["id"],
        "name" => $row["name"],
        "age"  => $row["age"],
    ];
}

$stmt->close();

//* процедурный подход:
$stmp
    = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "si", $column_2_value, $column_3_value);
mysqli_stmt_execute($stmt);
//.. fetch
mysqli_stmt_close($stmt);

//* подготовленные выражения работают только для where = ? условий
//* для конструирования выражений используем:

    $qDropTable = (object)
    [
        // "qStart" => "drop table `", "qEnd" => "`",
        "query"  => function($ptable) { return "drop table `".$ptable."`";},
        "result" => null,
    ];

    foreach($qShowTables->tables as $k=>$v)
    {
        //$q = "".$qDropTable->qStart.$v.$qDropTable->qEnd;
        $q = ($qDropTable->query)($v);
        $qDropTable->result = $db->connection->query(
            $q,
            MYSQLI_USE_RESULT
        );
    }
?>


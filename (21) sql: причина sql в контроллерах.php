<?php
//!---- (PHP): SQL: Причина почему SQL хранится в контроллерах:
/*
  SQL сам по себе достаточно показателен и самодостаточен,
  чтобы не заменять его сурогатами

  добавление дополнительных прослоек ни дает ничего коду,
  и устраняет вариант 3 из приведенного,
  то есть делает код хуже.
*/

//* вариант с SQL:
$sql =
"
create temporary table `table1` (
    `uid` int unsigned NOT NULL auto_increment,
    `name` varchar(100) not null,
    `one` int not null,
    `two` int not null,
    `thr` int not null,
    primary key (`uid`)
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='this is the comment';
";

//* вариант с сурогатом:
/*
  как видно вариант ничего не добавляет
  и никаких ошибок тоже не устраняет

  и это не относится к TheModel так как там 
  концепт не запроса - а принципиальной разметки
  (то есть прототипирования)
  хранимых,принимаемых и получаемых данных
*/
$table =
[
    "name" => "table1",
    "type" => "ENGINE=InnoDB DEFAULT CHARSET=utf8mb4",
    "fields" =>
    [
        ["uid","int unsigned not null auto_increment"],
        ["name","varchar(100) not null"],
        ["one", "int not null"],
        ["two", "int not null"],
        ["thr", "int not null"],
    ],
    "primaryKey" => "uid",
    "comment" => "this is the comment",
];

//* лучшее из пхп и скл:
/*
  можно комбинировать - чтобы получать лучшее
  из двух миров
  здесь мы используем для повторяемых запросов функцию
  однако - сам код сохраняется ВНУТРИ контроллера
  на том шаге к которому этот запрос относится
*/
$qDeleteTables = (object)
[
    "tables" => [],
    "query"  => function(string $ptable) {return "drop table `{$ptable}`";},
    "result" => null,
];



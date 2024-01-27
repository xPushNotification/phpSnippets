
<?php
//!---- (PHP): MySQLi: Подмена Базы Данных в Тестах:
/*
    для того чтобы иметь возможность тестировать
    контроллеры без постоянного подключения к базе данных
    создается прослойка - с которой контроллер и работает
    ну так вот эта прослойка и набивается нужными 
    для тестов значениями
*/

//* testmodel.model.php
class TestModel
{
    protected int $uid = -1;
    protected int $one = -1;
    protected int $two = -1;

    //* setters:
    function setUid(int $puid) {$this->uid = $puid;}
    function setOne(int $pone) {$this->one = $pone;}
    function setTwo(int $ptwo) {$this->two = $ptwo;}

    //* getters:
    function getUid() {return $this->uid;}
    function getOne() {return $this->one;}
    function getTwo() {return $this->two;}

    //* lifestyle:
    function __construct(array $pparams = [])
    {
        if(isset($pparams["uid"])) {$this->uid = $pparams["uid"];}
        if(isset($pparams["one"])) {$this->uid = $pparams["one"];}
        if(isset($pparams["two"])) {$this->uid = $pparams["two"];}
    }

} // c:TestModel

//* controller.php
$dataFromDB = [];

// если мы тестируем - нам не нужно делать подключение к базе, мы можем обойтись и промежуточными
// пакованными в модель:
$dataForTesting =
[
    new TestModel(["uid"=>1, "one"=>2, "two"=>3]),
    new TestModel(["uid"=>2, "one"=>4, "two"=>5]),
];

if(true && "testing")
{
    $dataFromDB = $dataForTesting;

} // "testing"

if(false && "production")
{
    $sql = "select id, one, two from ModelClass limit 2";
    $result = mysqli_query($conn, $sql, MYSQLI_USE_RESULT);

    while($row = $result->fetch_assoc())
    {
        //! здесь произошла подмена
        $dataFromDB[] = new TestModel(["uid"=>$row["id"], "one"=>$row["one"], "two"=>$row["two"]]);
    }

} // "production"

// на этом этапе мы используем $dataFromDB вне зависимости от того откуда данные приходят

// с этого момента работа идет все равно просто с массивом
// и данными хранимыми в ModelClass
// (print_r системная - покажет и защищенные члены)
print_r($dataFromDB);

?>


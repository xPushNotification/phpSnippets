<?php
//!---- (PHP): Поколения Представления Модели:

/*
    Алгоритмы прототипируют моделям (нет модели - нет прототипа)
    модель развивается от совсем черновой, до представлением классом

    Модель 0:   прототип (основная для хранения вр.данных в шагах контроллера)
    Модель 1:   грязная модель (лучше игнорировать)
    Модель 2:   типичный класс (контроль данных + union + get/is/set)
    TheModel:   логический аналог "Модель 2" аналог табличного вхождения в БД

    Вообще рекомендуется использовать Модель 0(прототип) -> TheModel(продакшн)
    Большая ошибка прототипировать Моделью 2 (много бесполезного кода).
    Классы ООП - не модель.
*/

//* Модель 0 (обычный объект) -- размножать не выйдет, ни типов, ни валидации:
$john = (object)
[
    "age" => 16,
    "name" => "John",
    "lazy" => "yes",        // yes | no
    "city" => "London",     // [..]
];

//* Модель 1 (класс - где переменные заданы конструктором) -- уже размножаемый объект
class Man1
{
    public function __construct($pparams = [])
    {
        $this->age  = (int)   $pparams["age"]  ?? 16;
        $this->name = (string)$pparams["name"] ?? "John";
        $this->lazy = (string)($pparams["lazy"] ?? "yes");        // yes | no
        $this->city = (string)($pparams["city"] ?? "London");     // [..]
    }
} // c:Man1
$john  = new Man1(["name"=>"John", "age"=>16]);
print_r($john);

//* Модель 2 (появляется default,списки значений,валидация,и тд и тп.)
class Man2
{
    //* переменные:
    protected $age = 16;
    protected $name = "John";
    protected $lazy = "yes";
    protected $city = "London";

    //* списки возможных значений:
    protected $lazyList = ["yes", "no"];           function listLazy() {return $this->lazyList;}
    protected $cityList = ["London", "Moscow"];    function listCity() {return $this->cityList;}

    //* сетеры:
    function setAge($page)   {if(gettype($page == "integer")){$this->age = $page; return;} throw new Exception("Man->age set problem:".$page); }
    function setName($pname) {if(gettype($pname) == "string"){$this->name = $pname; return;} throw new Exception("Man->name set problem:".$pname); }
    function setLazy($plazy) {if(gettype($plazy) == "string")if(in_array($plazy, $this->lazyList)){ $this->lazy = $plazy; return;} throw new Exception("Man->lazy set problem:".$plazy); }
    function setCity($pcity) {if(gettype($pcity) == "string")if(in_array($pcity, $this->cityList)){ $this->city = $pcity; return;} throw new Exception("Man->city set problem:".$pcity); }

    //* гетеры:
    function getAge() {return $this->age;}
    function getName() {return $this->name;}
    function getLazy() {return $this->lazy;}
    function getCity() {return $this->city;}

    public function __construct($pparams = [])
    {
        if(isset($pparams["age"]))  {$this->setAge($pparams["age"]);}
        if(isset($pparams["name"])) {$this->setName($pparams["name"]);}
        if(isset($pparams["lazy"])) {$this->setLazy($pparams["lazy"]);}
        if(isset($pparams["city"])) {$this->setCity($pparams["city"]);}

    } // m:__construct

    //* тесты:
    public static function test()
    {
        $obj = new Man2(["name"=>"Gold", "city"=>"Moscow"]);
        print_r($obj);

        $obj = new Man2(["name"=>"Silver", "city"=>"city17"]);
        print_r($obj);

    } // ms:test

} // c:Man2

try
{
    Man2::test();
}
catch (Exception $e)
{
    echo $e->getMessage();
    echo PHP_EOL;
}
?>


<?php
//!---- (PHP): OOП: Декларация: Трейты:

//? ATrait::
trait ATrait
{
    public string $ta = "";
    function af(){echo "ATrait::af".PHP_EOL;}
    function bf(){echo "ATrait::bf".PHP_EOL;}

} //t:ATrait

//? BTrait::
trait BTrait
{
    public string $tb = "";

    // здесь конфликт имен с A_TRAIT
    function af(){echo "BTrait::af".PHP_EOL;}
    function cf(){echo "BTrait::cf".PHP_EOL;}
    function df(){echo "BTrait::df".PHP_EOL;}

} //t:BTrait

//? One::
class One
{
    //* Менеджмент имен трейтов:
    use ATrait, BTrait
    {
        ATrait::af insteadof BTrait;   // af:func - предпочтение из ATrait
        BTrait::af as ff;              // BTrait::af трактовать как ff
        df as protected;               // df - трактовать как protected
    }

} //c:One

$one = new One();
$one->af();         // ATrait:af
$one->ff();         // BTrait:af

?>


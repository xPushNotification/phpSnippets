<?php
//!---- (PHP): OOП: Произвольные Вызовы: __call:

class TheCaller
{
    public function existed(string $pstr = "test")
    {
        echo "existed", PHP_EOL;
    }

    public function __call($pcallback, $pparams)
    {
        echo "called", PHP_EOL;         // обработка вызова
        echo $pcallback, PHP_EOL;       // станет 'test'
        print_r($pparams);              // ["one","two","thr"]

    }//f:__call

}//c:TheCaller

$caller = new TheCaller();
$caller->test("one","two","thr");
$caller->existed("testing");            // обработчика __call не будет
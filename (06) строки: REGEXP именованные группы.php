<?php
//!---- (PHP): Строки: Regexp: Именованные группы -> (?<name>__)
$subject = "test@example.com";
$p = (object)
[
    "name"    => "(?<name>\w+)",     // test
    "domain"  => "(?<domain>\w+)",   // example
    "tld"     => "(?<tld>\w+)",      // com
];
$pattern = "/^{$p->name}@{$p->domain}.{$p->tld}/";

$matches = [];
preg_match($pattern, $subject, $matches);

var_dump($matches);
////------------>>>>
/*
array(7) {
  [0]=>         string(16) "test@example.com"
  [1]=>         string(4) "test"
  [2]=>         string(7) "example"
  [3]=>         string(3) "com"
  ["name"]=>    string(4) "test"      // (?<name>w+)
  ["domain"]=>  string(7) "example"   // (?<domain>w+)
  ["tld"]=>     string(3) "com"       // (?<domain>w+)
}
*/
////------------<<<<
?>


<?php
//!---- (PHP): Форматы: XML:
$xmlString = <<< DOC
<root>
<teams>
    <team>Silverbacks</team>
    <team foo="winner">Golden Eyes</team>
</teams>
</root>
DOC;

//* процедурно:
$xml = simplexml_load_string($xmlString);
$xml = simplexml_load_file("file.xml");

//* объектом:
$xml = new SimpleXMLElement($xmlString);
echo $xml->teams->team[0];
?>


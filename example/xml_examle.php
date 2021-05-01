<?php

include __DIR__ . "/../vendor/autoload.php";

use Fernandoebert\XmlTools\xml;

// EXAMPLE XML ENCODE
$example = [
	"root" => [
		"key01" => "value01",
		"key02" => "value02",
		"key03" => [
			'subkey01' => [
					'item01',
					'item02',
					'item03',
					'item04',
			]
		]
	]
];

$xml = xml::xml_encode($example);
echo $xml;


#  STDCLASS
pre(xml::xml_decode($xml));

#  ARRAY
pre(xml::xml_decode($xml, true));


function pre($mixed){
    echo "<pre>";
    print_r($mixed);
    echo "</pre>";
}
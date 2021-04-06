<?php

include __DIR__ . "/../vendor/autoload.php";

use Fernandoebert\XmlTools\xml;

$example = [
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
];

$xml = xml::xml_encode($example);
echo $xml;
<?php

include __DIR__ . "/../vendor/autoload.php";

use Fernandoebert\XmlTools\xmlTools;

// EXAMPLE XML ENCODE
$example = [
    "root" => [
        "key01" => [
            '_value' => "Value Of _value"
        ],
        "key02" => [
            '_cdata' => "Value of CDATA",
        ],
        "key03" => [
            '@attr' => [
                'key01' => 'ValuesOfAttr01',
                'key02' => 'valuesOfAttr02',
                'key03' => 'valuesOfAttr03',
            ],
            'subkey01' => [
                'item01',
                'item02',
                'item03',
                'item04',
            ]
        ]
    ]
];

$xml = xmlTools::xml_encode($example, false);
//echo $xml;

//#  STDCLASS
pre(xmlTools::xml_decode($xml));
//
//#  ARRAY
//pre(xmlTools::xml_decode($xml, true));


function pre($mixed)
{
    echo "<pre>";
    print_r($mixed);
    echo "</pre>";
}
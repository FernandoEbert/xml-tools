<?php

namespace Fernandoebert\XmlTools;
use DOMDocument;
use DOMElement;
use SimpleXMLElement;

class xmlTools
{

    static function xml_encode($mixed, $header = true, $domElement = null, $DOMDocument = null, $version = "1.0", $encodingType = "UTF-8")
    {
        if(is_null($DOMDocument)){

            $DOMDocument = new DOMDocument($version, $encodingType);
            $DOMDocument->formatOutput = true;
            static::xml_encode($mixed,$header,$DOMDocument,$DOMDocument);

            if ($header){
                header("Content-type: text/xml");
                return $DOMDocument->saveXML();
            } else {
                return $DOMDocument->saveXML($DOMDocument->documentElement);
            }

        } else {

            if (isset($mixed['@attr']) && is_array($mixed['@attr']) && array_key_exists('@attr', $mixed)){
                foreach ($mixed['@attr'] as $key => $value){
                    $node = $domElement->setAttribute($key, $value);
                }
                unset($mixed["@attr"]);
            }

            if (isset($mixed['_cdata']) && is_string($mixed['_cdata']) && array_key_exists('_cdata', $mixed)){
                $node = $domElement->appendChild($DOMDocument->createCDATASection($mixed['_cdata']));
                unset($mixed['_cdata']);
            }

            if (isset($mixed['_value']) && is_string($mixed['_value']) && array_key_exists('_value', $mixed)){
                $domElement->nodeValue = htmlspecialchars($mixed['_value']);
                unset($mixed['_value']);
            }

            if(is_array($mixed)){
                foreach($mixed as $index => $mixedElement){
                    if(is_int($index)){
                        if($index == 0){
                            $node = $domElement;
                        } else {
                            $node = $DOMDocument->createElement($domElement->tagName);
                            $domElement->parentNode->appendChild($node);
                        }
                    } else {
                        $plural = $DOMDocument->createElement($index);
                        $domElement->appendChild($plural);
                        $node = $plural;
                        if(rtrim($index,'') !== $index){
                            $singular = $DOMDocument->createElement(rtrim($index,''));
                            $plural->appendChild($singular);
                            $node = $singular;
                        }
                    }
                    static::xml_encode($mixedElement,$header,$node,$DOMDocument);
                }
            } else {
                $domElement->appendChild($DOMDocument->createTextNode($mixed));
            }
        }
    }

    public function xml_decode(string $xml, $assoc = false)
    {
        $xmlObject = simplexml_load_string($xml);
        return json_decode(json_encode($xmlObject), $assoc);
    }

}

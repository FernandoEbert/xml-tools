<?php

namespace Fernandoebert\XmlTools;
use DOMDocument;
use DOMElement;
use SimpleXMLElement;

class xml
{    
    /**
     * xml_encode
     *
     * @param  mixed $mixed
     * @param  bool $header
     * @param  DOMElement $domElement
     * @param  DOMDocument $DOMDocument
     * @param  string $version
     * @param  string $encodingType
     * @return void
     */
    static function xml_encode($mixed, $header = true, $domElement = null, $DOMDocument = null, $version = "1.0", $encodingType = "UTF-8")
    {
        if(is_null($DOMDocument)){
        
            $DOMDocument = new DOMDocument($version, $encodingType);
            $DOMDocument->formatOutput = true;
            static::xml_encode($mixed,$header,$DOMDocument,$DOMDocument);

            header("Content-type: text/xml");
            return ($header)? $DOMDocument->saveXML() : $DOMDocument->saveXML($DOMDocument->documentElement); 
            
        } else {
    
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
    
    /**
     * xml_decode
     *
     * @param  string $xml
     * @param  bool $assoc
     * @return void
     */
    static function xml_decode(string $xml, $assoc = false)
    {
        $xmlObject = simplexml_load_string($xml);
        return json_decode(json_encode($xmlObject), $assoc);
    }
    
}

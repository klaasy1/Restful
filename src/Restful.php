<?php

namespace klaasy1\Restful;

use klaasy1\Restful\AbtractRestful;

class Restful extends AbtractRestful {

    //Use this as an example to implement this according to your need, or just overide this function
    public function encodeHtml($responseData) {

        $htmlResponse = "<table border='1'>";
        foreach ($responseData as $key => $value) {
            $htmlResponse .= "<tr><td>" . $key . "</td><td>" . $value . "</td></tr>";
        }
        $htmlResponse .= "</table>";
        return $htmlResponse;
    }

    //Use this as an example to implement this according to your need, or just overide this function
    public function encodeXml($responseData) {
        // creating object of SimpleXMLElement
        $xml = new SimpleXMLElement('<?xml version="1.0"?><root></root>');
        foreach ($responseData as $key => $value) {
            $xml->addChild('element' . $key, $value);
        }
        return $xml->asXML();
    }

}

?>
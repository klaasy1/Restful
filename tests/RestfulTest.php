<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

use klaasy1\Restful\Restful;

class RestfulTest extends PHPUnit_Framework_TestCase {
    
    public function testgetHttpStatusMessage() {
        $rest = new Restful;
        $this->expectOutputString("Switching Protocols");
        echo $rest->getHttpStatusMessage(101);
    }

}
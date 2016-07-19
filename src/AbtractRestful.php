<?php 
/*
 * Authors: Klaas Masana <kmrikhotso@gmail.com>
 * 
 * 
 * A simple RESTful webservices base class
 */

namespace klaasy1\Restful;

abstract class AbtractRestful {

    private $httpVersion = "HTTP/1.1";
    
    /*
     * This function set the minimum HTTP Headers
     */
    public function setHttpHeaders($contentType, $statusCode) {

        $statusMessage = $this->getHttpStatusMessage($statusCode);

        header($this->httpVersion . " " . $statusCode . " " . $statusMessage);
        header("Content-Type:" . $contentType);
    }

    /*
     * This function return the meaning of the status code set
     * @Param $statusCode
     */
    public function getHttpStatusMessage($statusCode) {
        $httpStatus = array(
            100 => 'Continue',
            101 => 'Switching Protocols',
            200 => 'OK',
            201 => 'Created',
            202 => 'Accepted',
            203 => 'Non-Authoritative Information',
            204 => 'No Content',
            205 => 'Reset Content',
            206 => 'Partial Content',
            300 => 'Multiple Choices',
            301 => 'Moved Permanently',
            302 => 'Found',
            303 => 'See Other',
            304 => 'Not Modified',
            305 => 'Use Proxy',
            306 => '(Unused)',
            307 => 'Temporary Redirect',
            400 => 'Bad Request',
            401 => 'Unauthorized',
            402 => 'Payment Required',
            403 => 'Forbidden',
            404 => 'Not Found',
            405 => 'Method Not Allowed',
            406 => 'Not Acceptable',
            407 => 'Proxy Authentication Required',
            408 => 'Request Timeout',
            409 => 'Conflict',
            410 => 'Gone',
            411 => 'Length Required',
            412 => 'Precondition Failed',
            413 => 'Request Entity Too Large',
            414 => 'Request-URI Too Long',
            415 => 'Unsupported Media Type',
            416 => 'Requested Range Not Satisfiable',
            417 => 'Expectation Failed',
            500 => 'Internal Server Error',
            501 => 'Not Implemented',
            502 => 'Bad Gateway',
            503 => 'Service Unavailable',
            504 => 'Gateway Timeout',
            505 => 'HTTP Version Not Supported');
        return ($httpStatus[$statusCode]) ? $httpStatus[$statusCode] : $status[500];
    }
    
    /*
     * This function returns the json format of the data received
     * @Param $responseData
     */
    public function encodeJson($responseData) {
        $jsonResponse = json_encode($responseData);
        return $jsonResponse;		
    }
    
    abstract function encodeHtml($responseData); //Any class that extends this class must implement this method
    
    abstract function encodeXML($responseData); //Any class that extends this class must implement this method
    
    /*
     * This function will echo the data in the format set by the header
     * @param $rawData - The Data that must be formatted to according to Header Content-Type
     * @param $statusCode - The Status Code
     * 
     */
    public function getData($rawData, $statusCode = '') {

        if($statusCode == ''){
            if(empty($rawData)) {
                    $statusCode = 404;
                    $rawData = array('error' => 'No Data available!');		
            } else {
                    $statusCode = 200;
            }
        }

        $ContentType = $_SERVER['HTTP_ACCEPT'];
        $this->setHttpHeaders($ContentType, $statusCode);

        $response = '';
        switch($ContentType){
            case 'application/json':
                $response = $this->encodeJson($rawData);
                break;
            case 'text/html':
                $response = $this->encodeHtml($rawData);
                break;
            case 'application/xml':
                $response = $this->encodeXml($rawData);
                break;
        }
        
        return $response;
        
    }

}

?>
# Restful
This is a simple rest base class for beginners in rest

### Installation

Either run

```
$ php composer.phar require klaasy1/restful: "dev-master"
```

or add

```
"klaasy1/restful": "dev-master"
```

to the ```require``` section of your `composer.json` file.

## Usage
```php
use klaasy1\Restful\Restful;

$rest = new Restful();

//This part is your raw data
$myModel = new myModel();
$rawData = $myModel->getRawData();
       
echo $rest->getData($rawData);
```
Returns a json response as the default.
You can set Accept request header to either return xml or html respone, please note that you need to extend AbtractRestful class and implement encodeHtml and encodeXml functions according to your response data needs and use your RestfulClass instead.

##Example
```php
class RestfulClass extends AbtractRestful {

    //Use this as an example to implement this according to your need
    public function encodeHtml($responseData) {

        //Html respose data here
        return $htmlResponse;
    }

    //Use this as an example to implement this according to your need
    public function encodeXml($responseData) {
        //SimpleXMLElement Object
        $xml = new \SimpleXMLElement('<?xml version="1.0"?><root></root>');
        //Build your xml document here
        return $xml->asXML();
    }

}

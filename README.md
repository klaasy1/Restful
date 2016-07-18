# Restful
This is a simple rest base class for beginners in rest

### Installation

Add

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
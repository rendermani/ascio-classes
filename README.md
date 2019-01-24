# ascio-classes
Classes to connect to the Ascio API. Please see https://aws.ascio.info for details. 

# Usage

## Create a composer.json file in the root of your project

```json
{   
    "repositories": [
        {
            "type": "vcs",
            "url": "https://github.com/rendermani/ascio-classes"
        }
    ],
    "require": {
        "php": ">=5.3.0",
        "ext-soap": "*", 
        "ascio/ascio-classes" : "dev-master"
    }
}
```

## Create a config.json file in the root of your project
```json
{
    "live" : {
        "v2" : {
            "account" : "",
            "password" : "",
             "wsdl" : "https://aws.ascio.com/2012/01/01/AscioService.wsdl"
        },
        "v3" : {
            "account" : "",
            "password" : "",
            "wsdl" : "https://aws.ascio.com/v3/aws.wsdl"
        },
        "dns" : {
            "account" : "",
            "password" : "",
            "wsdl" : "https://dnsservice.ascio.com/2010/10/30/DnsService.wsdl"
        }
    },
    "testing" : {
        "v2" : {
            "account" : "",
            "password" : "",
            "wsdl" : "https://aws.demo.ascio.com/2012/01/01/AscioService.wsdl"
        },
        "v3" : {
            "account" : "",
            "password" : "",
            "wsdl" : "https://aws.demo.ascio.com/v3/aws.wsdl"
        },
        "dns" : {
            "account" : "",
            "password" : "",
            "wsdl" : "https://dnsservice.demo.ascio.com/2010/10/30/DnsService.wsdl"
        }
    }
}
```
Please enter your ascio credentials. 

## Run composer

Please look at https://getcomposer.org/ for composer installation-instructions. 

```shell
composer install
```

## Run an example

```php
<?php
require_once("vendor/autoload.php");
use ascio\v3 as v3;
use ascio\v2 as v2;
use ascio\dns as dns; 
use ascio\lib as lib;
use ascio\lib\AscioException; 

use ascio\v2\PollMessage;
use ascio\v2\MessageType;

$client = lib\Ascio::getClientV2("testing");
$pollMessage = new PollMessage(0,MessageType::Message_to_Partner);
try {   
    $result = $client->PollMessage($pollMessage);
    var_dump($result->getMsgCount());
} catch (AscioException $e) {
    echo $e->debug();
    echo $e->debugSoap();
}
```
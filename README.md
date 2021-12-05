# Laravel HTTP SMS Sender
![image](https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)
[![Latest Stable Version](http://poser.pugx.org/durranilab/httpsms/v)](https://packagist.org/packages/durranilab/httpsms)
[![License](http://poser.pugx.org/durranilab/httpsms/license)](https://packagist.org/packages/durranilab/httpsms)
##### Easy HTTP (GET/POST) SMS Package for Indian SMS Service Providers.

**Features**

- Easy to use and customize api
- Supports almost all http sms service providers
- A simple configuration in single file
- Use dynamic parameters at runtime
- Config query parameters and post fields in config file

**Installation**

Use composer to install package in your laravel project

Type in terminal
 
```shell script
composer require durranilab/httpsms
```

Publish a config file
```shell script
php artisan vendor:publish --tag=sms-config
```
This will generate a config file at _**config/smsconfig.php**_

**Configuration** 
Open config/smsconfig.php
- Insert your url from SMS Provider
- Insert your url Parameters as requires
(you can insert any number of parameters for your request) 

Sample config file:
```php

<?php
return [
    // HTTP METHOD (get/post)
    'method' => 'get',
    //SMS URL (FOR SENDING SMS)
    'sms_url' => 'http://www.alots.in/sms-panel/api/http/index.php',
    'sms_params' => [
        'username' => 'API_USER_NAME',
        'apikey' => 'API_KEY_OR_PASSWORD',
        'CUSTOM_FIELD_3' => 'ANY_INFO',
    ],
    //BALANCE CHECK URL (FOR SENDING SMS)
    'balance_url' => 'http://www.alots.in/sms-panel/api/http/index.php',
    'balance_params' => [
        'username' => 'API_USER_NAME',
        'apikey' => 'API_KEY_OR_PASSWORD',
        'ANY_QUERY' => 'ANY_QUERY',
        'route' => 'TRANS',
        'format' => 'JSON,TEXT',
    ],

];

```


**Usage**
 
- Using Facades

```php
use Durranilab\Httpsms\Facades\HttpSMS; 

...

// WHEN ALL PARAMETERS ARE SET IN CONFIG FILE USE
$balanceResponse = HttpSMS::getBalance();
// OR TO USE PARAMETERS IN METHOD
$balanceResponse = HttpSMS::getBalance(
                    ['username'=>'durranilab',
                    'password'=>'YOURPASSWORD',
                    ]);

//TO SEND SMS
$phone = "9764000000,9764123456,...";
$msg = "SMS \n TEXT ";

// WHEN ALL PARAMETERS ARE SET IN CONFIG FILE USE
$smsResponse = HttpSMS::sendMessage();
// OR TO USE PARAMETERS IN METHOD
$smsResponse = HttpSMS::sendMessage([
                   'TemplateID' => '1234567890',
                   'message' => $msg,
                   'mobile' => $phone]);

```

- Using Class Methods

```php
use Durranilab\Httpsms\HttpSMS;
...

$smsProvider = new HttpSMS();

$balanceResponse = $smsProvider->getBalance();
$smsResponse = $smsProvider->sendMessage();
//OR
$balanceResponse = $smsProvider->getBalance(['username'=>'user123']);
$smsResponse = $smsProvider->sendMessage(['username'=>'user123']);
```

For any issue feel free to raise an issue on github repo.

Thank You!

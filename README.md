# sensorio-php-sdk

## Installation

This library supports PHP 7.4 and later

The recommended way to install sensorio-php-php is through [Composer](https://getcomposer.org):

```sh
composer require sensorio/sensorio-php-sdk php-http/guzzle6-adapter
```

## Clients

Initialize your client using your access token:

```php
use Sensorio\SensorioClient;

$client = new SensorioClient('<insert_app_key_here>');
```
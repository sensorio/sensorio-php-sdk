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

$client = new SensorioClient('<insert_api_key_here>');
```

## Users
Track user events

```php
$user = new SensorioUser($client);
$user->trackEvent([
    "companyId" => "1", //company id
    "companyName" => "ACME company", //company name
    "userId" => "11XAD", //user id
    "userName" => "John Doe", //user name
    "category" => "feature", //event category
    "action" => "action", // event action
]);
```
## Companies.
Track companies events.

```php
$company = new SensorioCompany($client);
$company->trackEvent([
    "companyId" => "1", //company id
    "companyName" => "ACME company", //company name
    "category" => "feature", //event category
    "action" => "action", // event action
]);
```
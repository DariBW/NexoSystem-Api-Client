NEXOSYSTEMS PHP API Client
=======================
This **PHP 7.4+** library allows you to communicate with the NexoSystems-API.

[![Latest Stable Version](http://poser.pugx.org/dariusaurich/nexosystems-api/v)](https://packagist.org/packages/dariusaurich/nexosystems-api)
[![License](http://poser.pugx.org/bastianleicht/hosterapi-php/license)](https://packagist.org/packages/dariusaurich/nexosystems-api)

> You can find the full API documentation [here](https://docs.nexo.systems/)!

## Getting Started

Recommended installation is using **Composer**!

In the root of your project execute the following:
```sh
$ composer require dariusaurich/nexosystems-api
```

Or add this to your `composer.json` file:
```json
{
    "require": {
        "dariusaurich/nexosystems-api": "^1.0"
    }
}
```

Then perform the installation:
```sh
$ composer install --no-dev
```

### Examples

Creating the NexoSystems-Api main object:
```php
<?php
// Require the autoloader
require_once 'vendor/autoload.php';

// Use the library namespace
use NexoSystems\NexoSystems;

// Then simply pass your API-Token when creating the API client object.
$client = new NexoSystems('API-Token');

// Then you are able to perform a request
var_dump($client->kvm()->status('{serviceid}'));
?>
```
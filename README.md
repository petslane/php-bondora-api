# php-bondora-api
PHP library for using Bondora API

## Install

### Composer
Get php-bondora-api into your project
```
php composer.phar require petslane/php-bondora-api
```
Load composer autoloader
```php
require_once 'vendor/autoload.php';
```

### Manual
Download and extract library into desired folder.
Load php-bondora-api autoloader
```php
require_once 'path/to/library/bondoraApi.php';
```

## Usage
Documentation: http://petslane.github.io/php-bondora-api/doc/
```php

use Petslane\Bondora;

$config = array(
  // Bondora API url with path up to version part
  'url' => 'https://api-sandbox.bondora.com/api',
  'username' => 'email@example.com',
  'password' => 'secret',
  // optional, does automatic login
  'autologin' => true,
);
$api = new Bondora\Api($config);

// Log in and get token
# $api->login(); // No need as 'autologin' is set to true

// Get list of all auctions
$auctions = $api->auctions(array(
  'countries' => array('EE'),
  'interestMin' => 10,
));

// Get one auction by auction_id
$auction = $api->auction('3551302b-3f37-49f7-b97b-a4fb00f503a1');

// Bid on 2 auctions
$request = array(
  new Bondora\Definition\Bid(array(
    'AuctionId' => '3551302b-3f37-49f7-b97b-a4fb00f503a1',
    'Amount' => 25,
    'MinAmount' => 10,
  )),
  new Bondora\Definition\Bid(array(
    'AuctionId' => '88270e55-c2c3-431b-9870-a4fe00976b7d',
    'Amount' => 15,
    'MinAmount' => 15,
  )),
);
$api->bid($request);

// Get list of all bids placed
$bids = $api->bids();

// Logout, access token will be revoked
$api->logout();

```

## Current problems
`auctions` query filter is not working. Looks like Bondora bug.

## Api version
v1.0 - full support - https://api-sandbox.bondora.com/doc?v=1





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
    'auth' => array(
        'url_base' => 'https://www-sandbox.bondora.com',
        'client_id' => 'client_id_123',
        'secret' => 'secret_123',
        'scope' => 'BidsEdit BidsRead Investments SmBuy SmSell',
    ),
    'api_base' => 'https://api-sandbox.bondora.com',
);
$api = new Bondora\Api($config);

// Get login url
$url = $api->getAuthUrl();
// redirect user to $url. After login, user will be redirected back with get parameter 'code'

// get token from 'code' provided after user successful login
$token = $api->getToken($code);

// cache $token and later reuse it
$api->setToken($cached_token);

// get account balance
$balance = $api->accountBalance();

// get all investments
$investments = $api->accountInvestments();

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
  )),
);
$api->bidPost($request);

// Get list of all bids placed
$bids = $api->bids();

// get secondary market listing
$sm_deals = $api->secondaryMarket(array(
    'countries' => array('EE', 'FI'),
    'interestMin' => 12,
    'incomeVerificationStatus' => Petslane\Bondora\Enum\AuctionIncomeVerificationStatus::VerifiedByPhone,
));

// revoke token
$api->revokeToken();

```

## Current problems
Please, let me know!

## Api version (https://api-sandbox.bondora.com/ChangeLog)
v1.0.0.3 (01.12.2015) - full support - https://api-sandbox.bondora.com/doc?v=1  
v1.0.0.2 (25.11.2015) - full support - https://api-sandbox.bondora.com/doc?v=1  
v1.0.0.1 (18.11.2015) - full support - https://api-sandbox.bondora.com/doc?v=1  
v1.0 (12.11.2015) - full support - https://api-sandbox.bondora.com/doc?v=1  
v1.0 Beta (03.09.2015) - full support - https://api-sandbox.bondora.com/doc?v=1  





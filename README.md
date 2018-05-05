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
        'url_base' => 'https://www.bondora.com',
        'client_id' => 'client_id_123',
        'secret' => 'secret_123',
        'scope' => 'BidsEdit BidsRead Investments SmBuy SmSell',
    ),
    'api_base' => 'https://api.bondora.com',
);
$api = new Bondora\Api($config);

// Get login url
$url = $api->getAuthUrl();
// redirect user to $url. After login, user will be redirected back with get parameter 'code'

// get token from 'code' provided after user successful login. Store access_token and refresh_token
$token_object = $api->getToken($code);

// reuse access_token acquired before
$api->setToken($access_token);

// in case access_token is expired, get new access_token from refresh_token
$token_object = $api->refreshToken($refresh_token);

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
    'incomeVerificationStatus' => Petslane\Bondora\Enum\IncomeVerificationStatus::VerifiedByPhone,
));

// Gets events that have been made with current access token
$events = $api->getEventlog();

// DataExport - get daily dataset of all loan data that is not covered by the data protection laws
$dataset = $api->loandataset(array(
    'countries' => 'EE',
));

// List of all reports
$reports = $api->reports();

// Get report data by report id
$report = $api->report($reports[0]->ReportId);

// Generate report
$reportResponse = $api->createReport(ReportType::Investments);

// revoke token
$api->revokeToken();

```

## Current problems
Please, let me know!
- `report()` returns now `Report` object with empty `Result` and empty `GeneratedOn` properties if report is still generating.  
Before it returned error with error-code 404 ("Report with Id ... is not found") when report was not ready.  
If `GeneratedOn` property is set, then report is ready and all data is in `Result` property.  
This behaviour is not documented by Bondora.  

## Bondora API support
Bondora API changelog - https://api.bondora.com/ChangeLog  
##### Supported versions:
- v1.0.2.2 (14.06.2017)  
- v1.0.2.1 (20.04.2017)  
- v1.0.2.0 (16.03.2017)  
- v1.0.1.9 (02.02.2017)  
- v1.0.1.8 (27.09.2016)  
- v1.0.1.7 (23.09.2016)  
- v1.0.1.6 (08.09.2016)  
- v1.0.1.5 (15.07.2016)  
    - Renamed enum classes:
        - AuctionQuestionEducation -> Education
        - AuctionQuestionEmploymentStatus -> EmploymentStatus
        - AuctionQuestionHomeOwnershipType -> HomeOwnershipType
        - AuctionIncomeVerificationStatus -> IncomeVerificationStatus
        - AuctionQuestionMaritalStatus -> MaritalStatus
        - AuctionQuestionOccupationArea -> OccupationArea
- v1.0.1.4 (09.07.2016)  
- v1.0.1.3 (25.05.2016)  
- v1.0.1.2 (22.03.2016)  
- v1.0.1.1 (29.01.2016)  
- v1.0.1.0 (14.01.2016)  
- v1.0.0.6 (07.01.2016)  
- v1.0.0.5 (21.12.2015)  
- v1.0.0.4 (10.12.2015)  
- v1.0.0.3 (01.12.2015)  
- v1.0.0.2 (25.11.2015)  
- v1.0.0.1 (18.11.2015)  
- v1.0 (12.11.2015)  
- v1.0 Beta (03.09.2015)  

## Bondora API documentation
https://api.bondora.com/doc?v=1  

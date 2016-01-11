<?php

namespace Petslane\Bondora;

use Petslane\Bondora\Definition;

class Api {

    private $config = array();
    const API_VERSION = 1;

    const THROTTLING_RETRIES = 2;

    private $token;

    private $http_codes = array(
        200 => '(Success) The request was successfully processed',
        202 => '(Accepted) The submitted data was successfully accepted, but it might take time to process the data',
        400 => '(Bad Request) Expected data or parameter is not provided, is in wrong format or request size is too big',
        401 => '(Unauthorized) The Authorization Token is not provided or the Token is not valid anymore',
        403 => '(Forbidden) User is not allowed to access or modify the resource',
        404 => '(Not Found) Data with specified parameters or the resource is not found',
        405 => '(Method Not Allowed) Request method (GET, POST, DELETE, PUT, etc.) is not allowed for the resource',
        409 => '(Conflict) There is conflict with the data provided',
        415 => '(Unsupported Media Type) Content-Type for request is not supported',
        429 => '(Too Many Requests) There are too many requests made in time frame. See Throttling section for more information.',
        500 => '(Internal Server Error) There was an unexpected error when processing the request',
    );
    private $error_codes = array(
        'G/auctions' => array(
            401 => 'User is not Authorized',
            429 => 'API calls quota exceeded! maximum admitted 1 per Second.',
        ),
        'G/auction/?' => array(
            400 => 'Auction ID is not provided',
            401 => 'User is not Authorized',
            404 => 'Auction with the provided ID was not found',
            429 => 'API calls quota exceeded! maximum admitted 1 per Second.',
        ),
        'G/bids' => array(
            401 => 'User is not Authorized',
            429 => 'API calls quota exceeded! maximum admitted 1 per Second.',
        ),
        'P/bid' => array(
            400 => 'No bids specified',
            401 => 'User is not Authorized',
            404 => 'Auction with specified ID is not found',
            429 => 'API calls quota exceeded! maximum admitted 1 per Second.',
        ),
        'P/bid/?/cancel' => array(
            400 => 'No Bid id specified',
            401 => 'User is not Authorized',
            403 => 'The user has no rights to cancel the Bid',
            404 => 'Bid with specified ID is not found',
            409 => 'Can not cancel Bid.',
            429 => 'API calls quota exceeded! maximum admitted 1 per Second.',
        ),
        'G/bid/?' => array(
            400 => 'No bids specified',
            401 => 'User is not Authorized',
            403 => 'User is not allowed to fully represent the specified organization',
            404 => 'Auction with specified ID is not found',
            409 => 'Can not cancel Bid.',
            429 => 'API calls quota exceeded! maximum admitted 1 per Second.',
        ),
        'G/account/balance' => array(
            401 => 'User is not Authorized',
            429 => 'API calls quota exceeded! maximum admitted 1 per Second.',
        ),
        'G/account/investments' => array(
            401 => 'User is not Authorized',
            429 => 'API calls quota exceeded! maximum admitted 1 per Second.',
        ),
        'G/loanpart/?' => array(
            400 => 'LoanPart ID is not provided',
            401 => 'User is not Authorized',
            404 => 'LoanPart with the provided ID was not found',
            429 => 'API calls quota exceeded! maximum admitted 1 per Second.',
        ),
        'G/secondarymarket/?' => array(
            400 => 'No id specified',
            401 => 'User is not Authorized',
            404 => 'SecondaryMarket item with specified ID is not found',
            429 => 'API calls quota exceeded! maximum admitted 1 per Second.',
        ),
        'P/secondarymarket/cancel' => array(
            400 => 'Not found/Too many items. Max items 100',
            401 => 'User is not Authorized',
            403 => 'User has no rights',
            409 => 'Cannot cancel item',
            429 => 'API calls quota exceeded! maximum admitted 1 per Second.',
        ),
        'G/secondarymarket' => array(
            401 => 'User is not Authorized',
            429 => 'API calls quota exceeded! maximum admitted 1 per Second.',
        ),
        'P/secondarymarket/buy' => array(
            400 => 'No items specified',
            401 => 'User is not Authorized',
            403 => 'User has no rights',
            404 => 'Not found',
            409 => 'Investment cannot be bought',
            429 => 'API calls quota exceeded! maximum admitted 1 per Second.',
        ),
        'P/secondarymarket/sell' => array(
            400 => 'No items specified',
            401 => 'User is not Authorized',
            403 => 'User has no rights',
            404 => 'Not found',
            409 => 'Investment cannot be sold',
            429 => 'API calls quota exceeded! maximum admitted 1 per Second.',
        ),
        'G/eventlog' => array(
            401 => 'User is not Authorized',
        ),
    );

    public function __construct($config) {
        if (empty($config['auth']['url_base'])) {
            throw new \InvalidArgumentException('Missing base_url in auth config');
        }
        if (empty($config['auth']['client_id'])) {
            throw new \InvalidArgumentException('Missing client_id in auth config');
        }
        if (empty($config['auth']['secret'])) {
            throw new \InvalidArgumentException('Missing secret in auth config');
        }
        if (empty($config['api_base'])) {
            throw new \InvalidArgumentException('Missing api_base in config');
        }
        if (empty($config['auth']['scope'])) {
            $config['auth']['scope'] = 'BidsEdit BidsRead Investments SmBuy SmSell';
        }

        $this->config = $config;
    }

    /**
     * Set access token
     *
     * @param string $token
     */
    public function setToken($token) {
        $this->token = $token;
    }

    /**
     * Get Api request url based on Api resource
     *
     * @param string $resource
     * @param string $id Placeholder "?" in resource will be replaced with this value
     * @return string
     * @throws ApiCriticalException
     */
    private function getUrl($resource, $id=null) {
        $url = $this->config['api_base'] . '/api/v' . self::API_VERSION . '/' . $resource;
        if ($id !== null) {
            $url = str_replace('?', $id, $url);
        }
        return $url;
    }

    /**
     * Validate Api resource name and Api response code
     *
     * @param string $resource
     * @param Client $client
     * @param string $method
     * @throws ApiCriticalException
     */
    private function validateResponseCode($resource, Client $client, $method) {
        $error_key = $method==Client::METHOD_POST?'P/':'G/';
        $error_key .= $resource;
        if (!isset($this->error_codes[$error_key])) {
            throw new ApiCriticalException('Unknown api method: "'.$resource.'"');
        }
        $http_code = $client->getHttpCode();
        if (!array_key_exists($http_code, $this->http_codes)) {
            throw new ApiCriticalException('Unexpected api http code ('.$http_code.') for resource "'.$method.'/'.$resource.'"');
        }
    }

    /**
     * Throw ApiException on failed response
     *
     * @param string $resource
     * @param array $json
     * @param string $method
     * @throws ApiCriticalException
     * @throws ApiException
     */
    private function validateResponse($resource, $json, $method) {
        if (!$json) {
            throw new ApiCriticalException('Missing response');
        }
        $error_key = $method==Client::METHOD_POST?'P/':'G/';
        $error_key .= $resource;
        $result = new Definition\ApiResult($json);

        if (!$result->Success) {
            foreach ($result->Errors as $e) {
                if (isset($this->error_codes[$error_key][$e->Code])) {
                    continue;
                }
                throw new ApiCriticalException('Unexpected error code ('.$e->Code.') for resource "'.$method.'/'.$resource.'": ' . json_encode($result->Errors));
            }
            throw new ApiException($result->Errors);
        }
    }

    /**
     * Get authorization url
     *
     * @return string
     */
    public function getAuthUrl() {

        $params = array(
            'client_id' => $this->config['auth']['client_id'],
            'scope' => $this->config['auth']['scope'],
            'response_type' => 'code',
        );
        if (!empty($this->config['auth']['redirect_uri'])) {
            $params['redirect_uri'] = $this->config['auth']['redirect_uri'];
        }

        return $this->config['auth']['url_base'] . '/oauth/authorize?' . http_build_query($params);
    }

    /**
     * Redeem access token from code
     *
     * @param string $code Authorization code
     * @return Definition\AccessTokenResult
     * @throws ApiCriticalException
     * @throws ApiException
     */
    public function getToken($code) {
        $param = new Definition\AccessTokenRequest();
        $param->grant_type = 'authorization_code';
        $param->client_id = $this->config['auth']['client_id'];
        $param->client_secret = $this->config['auth']['secret'];
        $param->code = $code;

        $client = new Client($this->config['api_base'] . '/oauth/access_token', json_encode($param), Client::METHOD_POST);

        $json = json_decode($client->getBody(), true);
        if (!empty($json['error'])) {
            $err_msg = $json['error'];
            if (!empty($json['error_description'])) {
                $err_msg .= ': ' . $json['error_description'];
            }
            throw new ApiCriticalException($err_msg);
        } else if (!empty($json['Errors'])) {
            $errors = array();
            foreach ($json['Errors'] as $e) {
                $errors[] = new Definition\ApiError($e);
            }
            throw new ApiException($errors);
        }

        $result = new Definition\AccessTokenResult($json);

        if (!$result->access_token) {
            throw new ApiCriticalException('access_token not found');
        }
        $this->token = $result->access_token;

        return $result;
    }

    /**
     * Redeem access token from refresh_token
     *
     * @param string $refresh_token Refresh token
     * @return Definition\AccessTokenResult
     * @throws ApiCriticalException
     * @throws ApiException
     */
    public function refreshToken($refresh_token) {
        $param = new Definition\AccessTokenRequest();
        $param->grant_type = 'refresh_token';
        $param->client_id = $this->config['auth']['client_id'];
        $param->client_secret = $this->config['auth']['secret'];
        $param->refresh_token = $refresh_token;

        $client = new Client($this->config['api_base'] . '/oauth/access_token', json_encode($param), Client::METHOD_POST);

        $json = json_decode($client->getBody(), true);
        if (!empty($json['error'])) {
            $err_msg = $json['error'];
            if (!empty($json['error_description'])) {
                $err_msg .= ': ' . $json['error_description'];
            }
            throw new ApiCriticalException($err_msg);
        } else if (!empty($json['Errors'])) {
            $errors = array();
            foreach ($json['Errors'] as $e) {
                $errors[] = new Definition\ApiError($e);
            }
            throw new ApiException($errors);
        }

        $result = new Definition\AccessTokenResult($json);

        if (!$result->access_token) {
            throw new ApiCriticalException('access_token not found');
        }
        $this->token = $result->access_token;

        return $result;
    }

    /**
     * Revoke authorization token. Call to the endpoint revokes the same Token that the request is using
     *
     * @return bool Indicates if the request was successfull or not
     * @throws ApiCriticalException
     * @throws ApiException
     */
    public function revokeToken() {
        $headers = array();
        $headers['Authorization'] = 'Bearer ' . $this->token;
        $client = new Client($this->config['api_base'] . '/oauth/access_token/revoke', array(), Client::METHOD_POST, $headers);

        $json = json_decode($client->getBody(), true);
        if (!empty($json['error'])) {
            $err_msg = $json['error'];
            if (!empty($json['error_description'])) {
                $err_msg .= ': ' . $json['error_description'];
            }
            throw new ApiCriticalException($err_msg);
        } else if (!empty($json['Errors'])) {
            $errors = array();
            foreach ($json['Errors'] as $e) {
                $errors[] = new Definition\ApiError($e);
            }
            throw new ApiException($errors);
        }

        $result = new Definition\ApiResult($json);

        if ($result->Success) {
            $this->token = null;
        }

        return $result->Success;
    }

    /**
     * Gets events that have been made with the application related to current access token
     *
     * @param null $eventDateFrom Start datetime
     * @param null $eventDateTo end datetime
     * @param int $eventType Event type. Value from Enum\ApiRequestLogEventType
     * @param string $ipAddress IP address
     * @param int $pageSize Max returned results, default is 1000
     * @param int $pageNr Result page nr
     * @return Definition\EventLogItem[]
     * @throws ApiCriticalException
     * @throws ApiException
     * @throws \Exception
     */
    public function getEventlog($eventDateFrom=null, $eventDateTo=null, $eventType=null, $ipAddress=null, $pageSize=1000, $pageNr=0) {
        $resource = 'eventlog';

        $param = new Definition\EventLogRequest();
        if ($eventDateFrom) {
            if (is_string($eventDateFrom)) {
                $param->EventDateFrom = (string) $eventDateFrom;
            } else if ($eventDateFrom instanceof \DateTime) {
                $param->EventDateFrom = $eventDateFrom->format('c');
            }
        }
        if ($eventDateTo) {
            if (is_string($eventDateTo)) {
                $param->EventDateTo = (string) $eventDateTo;
            } else if ($eventDateTo instanceof \DateTime) {
                $param->EventDateTo = $eventDateTo->format('c');
            }
        }
        if ($eventType) {
            $param->EventType = $eventType;
        }
        if ($ipAddress) {
            $param->IpAddress = $ipAddress;
        }
        if ($pageSize) {
            $param->PageSize = $pageSize;
        }
        if ($pageNr) {
            $param->PageNr = $pageNr;
        }

        $json = $this->query($resource, null, $param);

        $response = new Definition\ApiResultEventLog($json);

        return $response->Payload;
    }

    /**
     * Gets your account balance information
     *
     * @return Definition\MyAccountBalance
     * @throws ApiException
     * @throws \Exception
     */
    public function accountBalance() {
        $resource = 'account/balance';

        $json = $this->query($resource);

        $response = new Definition\ApiResultMyAccountBalance($json);

        return $response->Payload;
    }

    /**
     * Gets list of your investments
     *
     * $request array supported keys:
     *     loanIssuedDateFrom                  string|\DateTime    Loan issued start date from (string format YYYY-MM-DD hh:mm:ss)
     *     loanIssuedDateTo                    string|\DateTime    Loan issued start date to (string format YYYY-MM-DD hh:mm:ss)
     *     principalMin                        float               Remaining principal amount min
     *     principalMax                        float               Remaining principal amount max
     *     interestMin                         float               Interest rate min
     *     interestMax                         float               Interest rate max
     *     lengthMax                           int                 Loan lenght min
     *     lengthMin                           int                 Loan lenght max
     *     latePrincipalAmountMin              float               Principal debt amount min
     *     latePrincipalAmountMax              float               Principal debt amount max
     *     nextPaymentDateFrom                 string|\DateTime    Loan issued start date from (string format YYYY-MM-DD hh:mm:ss)
     *     nextPaymentDateTo                   string|\DateTime    Loan issued start date to (string format YYYY-MM-DD hh:mm:ss)
     *     countries                           string[]            Two letter iso code for country of origin: EE, ES, FI
     *     ratings                             string[]            Bondora's rating: AA, A, B, C, D, E, F, HR
     *     creditScoreMin                      int                 Minimum credit score
     *     creditScoreMax                      int                 Maximum credit score
     *     userName                            string              Borrower's username
     *     loanStatusCode                      int[]               Loan status code 2 Current, 100 Overdue, 5 60+ days overdue, 4 Repaid, 8 Released
     *     incomeVerificationStatus            int                 Income verification type @see Petslane\Bondora\Enum\AuctionIncomeVerificationStatus
     *     loanDebtManagementStage             int                 Latest debt management stage @see Petslane\Bondora\Enum\LoanDebtManagementEventType
     *     loanDebtManagementDateActiveFrom    string|\DateTime    Latest debt management date active from (string format YYYY-MM-DD hh:mm:ss)
     *     loanDebtManagementDateActiveTo      string|\DateTime    Latest debt management date active to (string format YYYY-MM-DD hh:mm:ss)
     *     auctionBidType                      int                 Auction bid type @see Petslane\Bondora\Enum\BidType
     *     salesStatus                         int                 Second market sale status NULL All, 0 Sold investments, 1 Bought investments
     *     isInRepayment                       bool                Search only active in repayment loans, StatusCodes (2, 5, 100)
     *     pageSize                            int                 Max returned results, default is 1000
     *     pageNr                              int                 Result page nr
     *
     *
     * @param array $request
     * @return Definition\MyInvestmentItem[]
     * @throws ApiCriticalException
     * @throws ApiException
     * @throws \Exception
     */
    public function accountInvestments($request=array()) {
        $resource = 'account/investments';

        $array_fields = array(
            'countries',
            'ratings',
            'loanStatusCode',
        );
        $int_fields = array(
            'lengthMax',
            'lengthMin',
            'creditScoreMin',
            'creditScoreMax',
            'loanStatusCode',
            'incomeVerificationStatus',
            'loanDebtManagementStage',
            'auctionBidType',
            'salesStatus',
            'pageSize',
            'pageNr',
        );
        $float_fields = array(
            'principalMin',
            'principalMax',
            'interestMin',
            'interestMax',
            'latePrincipalAmountMin',
            'latePrincipalAmountMax',
        );
        $date_fields = array(
            'loanIssuedDateFrom',
            'loanIssuedDateTo',
            'nextPaymentDateFrom',
            'nextPaymentDateTo',
            'loanDebtManagementDateActiveFrom',
            'loanDebtManagementDateActiveTo',
        );
        $string_fields = array(
            'countries',
            'ratings',
            'userName',
        );
        $bool_fields = array(
            'isInRepayment',
        );

        $params = $this->prepareRequestArray($request, $array_fields, $int_fields, $float_fields, $string_fields, $date_fields, $bool_fields);

        $json = $this->query($resource, null, $params);

        $response = new Definition\ApiResultMyInvestments($json);

        return $response->Payload;
    }

    /**
     * Gets list of active Auctions
     *
     * $request array supported keys:
     *     pageSize               int               Max returned results, default is 1000. Range: inclusive between 1 and 1000
     *     pageNr                 int               Result page nr. Range: inclusive between 1 and 2147483647
     *     countries              string[]          Two letter iso code for country of origin: EE, ES, FI
     *     ratings                string[]          Bondora's rating: AA, A, B, C, D, E, F, HR
     *     gender                 int               Borrower's gender: Male 0, Female 1, Unknown 2
     *     sumMin                 int               Minimal loan amount
     *     sumMax                 int               Maximum loan amount
     *     terms                  int[]             Loan length: 3, 9, 12, 18, 24, 36, 48, 60 months
     *     ageMin                 int               Minimal age
     *     ageMax                 int               Maximum age
     *     loanNumber             int               Loan number
     *     userName               string            Username
     *     applicationDateFrom    string|DateTime   Loan application started date from. (string format YYYY-MM-DD hh:mm:ss)
     *     applicationDateTo      string|DateTime   Loan application started date to. (string format YYYY-MM-DD hh:mm:ss)
     *     creditScoreMin         int               Minimum credit score
     *     creditScoreMax         int               Maximum credit score
     *     interestMin            float             Minimum interest
     *     interestMax            float             Maximum interest
     *     incomeTotalMin         float             Minimal total income
     *     incomeTotalMax         float             Maximum total income
     *     modelVersion           int               Model version
     *     expectedLossMin        float             Minimal expected loss
     *     expectedLossMax        float             Maximum expected loss
     *     listedOnUTCFrom        string|DateTime   Date when auction was published from. (string format YYYY-MM-DD hh:mm:ss)
     *     listedOnUTCTo          string|DateTime   Date when auction was published to. (string format YYYY-MM-DD hh:mm:ss)
     *
     * @param array $request
     * @return Definition\Auction[]
     * @throws ApiCriticalException
     * @throws ApiException
     */
    public function auctions($request=array()) {
        $resource = 'auctions';

        $array_fields = array(
            'countries',
            'ratings',
            'terms',
        );
        $int_fields = array(
            'pageSize',
            'pageNr',
            'gender',
            'sumMin',
            'sumMax',
            'ageMin',
            'ageMax',
            'loanNumber',
            'creditScoreMin',
            'creditScoreMax',
            'modelVersion',
        );
        $float_fields = array(
            'interestMin',
            'interestMax',
            'incomeTotalMin',
            'incomeTotalMax',
            'expectedLossMin',
            'expectedLossMax',
        );
        $string_fields = array(
            'countries',
            'ratings',
            'terms',
            'userName',
        );
        $date_fields = array(
            'applicationDateFrom',
            'applicationDateTo',
            'listedOnUTCFrom',
            'listedOnUTCTo',
        );

        $params = $this->prepareRequestArray($request, $array_fields, $int_fields, $float_fields, $string_fields, $date_fields, array());

        $json = $this->query($resource, null, $params);

        $response = new Definition\ApiResultAuctions($json);

        return $response->Payload;
    }

    /**
     * Gets Auction info by auction identifier
     *
     * @param string $id Auction's identifier
     * @return Definition\AuctionExtended
     * @throws ApiCriticalException
     * @throws ApiException
     * @throws \Exception
     */
    public function auction($id) {
        $resource = 'auction/?';

        $json = $this->query($resource, $id);


        $response = new Definition\ApiResultExtendedAuction($json);
        return $response->Payload;
    }

    /**
     * Gets list of active secondary market items
     *
     * $request array supported keys:
     *     loanIssuedDateFrom           date        Loan issued start date from
     *     loanIssuedDateTo             date        Loan issued start date to
     *     principalMin                 float       Remaining principal amount min
     *     principalMax                 float       Remaining principal amount max
     *     interestMin                  float       Interest rate min
     *     interestMax                  float       Interest rate max
     *     lengthMax                    int         Loan lenght min
     *     lengthMin                    int         Loan lenght max
     *     hasDebt                      bool        Is overdue
     *     loanStatusCode               int[]       Loan status code: 2 - Current; 100 - Overdue; 5 - 60+ days overdue;
     *     latePrincipalAmountMin       float       Principal debt amount min
     *     latePrincipalAmountMax       float       Principal debt amount max
     *     priceMin                     float       Price amount min
     *     priceMax                     float       Price amount max
     *     useOfLoan                    int         Use of loan. @see Petslane\Bondora\Enum\AuctionPurpose
     *     hasNewSchedule               bool        Has been rescheduled
     *     countries                    string[]    Two letter iso code for country of origin: EE, ES, FI
     *     ratings                      string[]    Bondora's rating: AA, A, B, C, D, E, F, HR
     *     creditScoreMin               int         Minimum credit score
     *     creditScoreMax               int         Maximum credit score
     *     userName                     string      Borrower's username
     *     gender                       int         Borrower's gender: Male 0, Female 1, Unknown 2
     *     ageMin                       int         Minimal age
     *     ageMax                       int         Maximum age
     *     incomeVerificationStatus     int         Income verification type. @see Petslane\Bondora\Enum\AuctionIncomeVerificationStatus
     *     showMyItems                  bool        Can find your own items from market: Value Null = ALL, True = only your items, False = other user items
     *     auctionId                    string      Can find specific auction from market
     *     listedOnDateFrom             date        Date when item was published from
     *     listedOnDateTo               date        Date when item was published to
     *     desiredDiscountRateMin       float       Minimal DesiredDiscountRate
     *     desiredDiscountRateMax       float       Maximal DesiredDiscountRate
     *     xirrMin                      float       Minimal Xirr
     *     xirrMax                      float       Maximal Xirr
     *     pageSize                     int         Max returned results, default is 1000. Range: inclusive between 1 and 1000
     *     pageNr                       int         Result page nr. Range: inclusive between 1 and 2147483647
     *
     * @param array $request
     * @return Definition\SecondMarketItem[]
     * @throws ApiException
     * @throws \Exception
     */
    public function secondaryMarket($request=array()) {
        $resource = 'secondarymarket';

        $array_fields = array(
            'countries',
            'ratings',
            'loanStatusCode',
        );
        $int_fields = array(
            'lengthMax',
            'lengthMin',
            'useOfLoan',
            'creditScoreMin',
            'creditScoreMax',
            'gender',
            'ageMin',
            'ageMax',
            'incomeVerificationStatus',
            'pageSize',
            'pageNr',
            'loanStatusCode',
        );
        $float_fields = array(
            'principalMin',
            'principalMax',
            'interestMin',
            'interestMax',
            'latePrincipalAmountMin',
            'latePrincipalAmountMax',
            'desiredDiscountRateMin',
            'desiredDiscountRateMax',
            'xirrMin',
            'xirrMax',
            'priceMin',
            'priceMax',
        );
        $string_fields = array(
            'countries',
            'ratings',
            'userName',
            'auctionId',
        );
        $date_fields = array(
            'loanIssuedDateFrom',
            'loanIssuedDateTo',
            'listedOnDateFrom',
            'listedOnDateTo',
        );
        $bool_fields = array(
            'hasDebt',
            'hasNewSchedule',
            'showMyItems',
        );

        $params = $this->prepareRequestArray($request, $array_fields, $int_fields, $float_fields, $string_fields, $date_fields, $bool_fields);

        $json = $this->query($resource, null, $params);

        $response = new Definition\ApiResultSecondMarket($json);

        return $response->Payload;
    }

    /**
     * Gets LoanPartDetails info by identifier
     *
     * @param string $id
     * @return Definition\LoanPartDetails
     */
    public function loanpart($id) {
        $resource = 'loanpart/?';

        $json = $this->query($resource, $id);

        $response = new Definition\ApiResultLoanPartDetails($json);

        return $response->Payload;
    }

    /**
     * Get the secondary market item summary
     *
     * @param string $id
     * @return Definition\SecondMarketItemSummary
     * @throws ApiException
     * @throws \Exception
     */
    public function secondaryMarketById($id) {
        $resource = 'secondarymarket/?';

        $json = $this->query($resource, $id);

        $response = new Definition\ApiResultSecondMarketItemSummary($json);

        return $response->Payload;
    }

    /**
     * Buy loans from secondary market
     *
     * @param string[] $ids Secondary market item ids to buy
     * @return bool
     * @throws ApiException
     * @throws \Exception
     */
    public function secondaryMarketBuy($ids) {
        $resource = 'secondarymarket/buy';

        $param = new Definition\SecondMarketBuyRequest();
        if (!is_array($ids)) {
            $ids = array($ids);
        }
        $param->ItemIds = $ids;

        $json = $this->query($resource, null, json_encode($param), Client::METHOD_POST);

        $response = new Definition\ApiResult($json);

        return $response->Success;
    }

    /**
     * Sell your loans to secondary market
     *
     * @param Definition\SecondMarketSell[] $sellParts LoanParts to sell
     * @return Definition\SecondMarketSaleResponse[]
     * @throws ApiException
     * @throws \Exception
     */
    public function secondaryMarketSell($sellParts) {
        $resource = 'secondarymarket/sell';

        $param = new Definition\SecondMarketSaleRequest();
        if (!is_array($sellParts)) {
            $sellParts = array($sellParts);
        }
        $param->Items = $sellParts;

        $json = $this->query($resource, null, json_encode($param), Client::METHOD_POST);

        $response = new Definition\ApiResultSecondMarketSale($json);

        return $response->Payload;
    }

    /**
     * Remove your loans from secondary market.
     *
     * @param string[]|string $id
     * @return bool
     * @throws ApiException
     * @throws \Exception
     */
    public function secondaryMarketCancel($id) {
        $resource = 'secondarymarket/cancel';

        $param = new Definition\SecondMarketCancelRequest();
        $param->ItemIds = (array) $id;

        $json = $this->query($resource, null, json_encode($param), Client::METHOD_POST);

        $response = new Definition\ApiResult($json);

        return $response->Success;
    }

    private function prepareRequestArray($request, $array_fields=array(), $int_fields=array(), $float_fields=array(), $string_fields=array(), $date_fields=array(), $bool_fields=array()) {
        $params = array();

        $all_fields = array_merge($int_fields, $float_fields, $string_fields, $date_fields, $bool_fields);
        $all_fields = array_unique($all_fields);
        foreach ($all_fields as $fld_name) {
            if (!isset($request[$fld_name])) {
                continue;
            }

            if (!is_array($request[$fld_name])) {
                $request[$fld_name] = array($request[$fld_name]);
            }
            $params['request.' . $fld_name] = array();
            foreach ($request[$fld_name] as $value) {
                if (in_array($fld_name, $int_fields)) {
                    $params['request.' . $fld_name][] = (int) $value;
                } else if (in_array($fld_name, $float_fields)) {
                    $params['request.' . $fld_name][] = (float) $value;
                } else if (in_array($fld_name, $string_fields)) {
                    $params['request.' . $fld_name][] = (string) $value;
                } else if (in_array($fld_name, $date_fields)) {
                    if (is_string($value)) {
                        $params['request.' . $fld_name][] = (string) $value;
                    } else if ($value instanceof \DateTime) {
                        $params['request.' . $fld_name][] = $value->format('c');
                    }
                } else if (in_array($fld_name, $bool_fields)) {
                    $params['request.' . $fld_name][] = $value?'true':'false';
                }
            }

            if (!in_array($fld_name, $array_fields)) {
                $params['request.' . $fld_name] = $params['request.' . $fld_name][0];
            }

        }

        return $params;
    }

    /**
     * Gets list of bids the investor has made.
     *
     * @param int $bidStatusCode Bid status code @see Petslane\Bondora\Enum\ApiAuctionBidRequestStatus
     * @param string|\DateTime $startDate Bids made from date. (string format YYYY-MM-DD hh:mm:ss)
     * @param string|\DateTime $endDate Bids made to date. (string format YYYY-MM-DD hh:mm:ss)
     * @param int $pageSize Max returned results, default is 1000. Range: inclusive between 1 and 1000
     * @param int $pageNr Result page nr. Range: inclusive between 1 and 2147483647
     * @return Definition\BidSummary[]
     * @throws ApiCriticalException
     * @throws ApiException
     */
    public function bids($bidStatusCode=null, $startDate=null, $endDate=null, $pageSize=null, $pageNr=null) {
        $resource = 'bids';

        $params = array();
        if ($bidStatusCode !== null) {
            $params['bidStatusCode'] = (int) $bidStatusCode;
        }
        if (is_string($startDate)) {
            $params['startDate'] = $startDate;
        } else if ($startDate instanceof \DateTime) {
            $params['startDate'] = $startDate->format('c');
        }
        if (is_string($endDate)) {
            $params['endDate'] = $endDate;
        } else if ($endDate instanceof \DateTime) {
            $params['endDate'] = $endDate->format('c');
        }
        if ($pageSize !== null) {
            $params['pageSize'] = (int) $pageSize;
        }
        if ($pageNr !== null) {
            $params['pageNr'] = (int) $pageNr;
        }

        $json = $this->query($resource, null, $params);

        $response = new Definition\ApiResultBids($json);

        return $response->Payload;
    }

    /**
     * Makes bid(s) into specified auction(s).
     *
     * @param Definition\Bid[] $bids The bids to make.
     * @return Definition\BidResponse[]
     * @throws ApiException
     * @throws \Exception
     */
    public function bidPost($bids) {
        $resource = 'bid';

        $param = new Definition\BidRequest();
        if (!is_array($bids)) {
            $bids = array($bids);
        }
        $param->Bids = $bids;

        $json = $this->query($resource, null, json_encode($param), Client::METHOD_POST);

        $response = new Definition\ApiResultMakeBids($json);

        return $response->Payload;
    }

    /**
     * Get the Bid
     *
     * @param string $id
     * @return Definition\BidSummary
     */
    public function bid($id) {
        $resource = 'bid/?';

        $json = $this->query($resource, $id);

        $response = new Definition\ApiResultBid($json);

        return $response->Payload;
    }

    /**
     * Cancel the Bid
     *
     * @param string $id
     * @return bool
     * @throws ApiException
     * @throws \Exception
     */
    public function bidCancel($id) {
        $resource = 'bid/?/cancel';

        $json = $this->query($resource, $id, null, Client::METHOD_POST);

        $response = new Definition\ApiResult($json);

        return $response->Success;
    }

    /**
     * Query data.
     * If getting throttling error, then sleeps and retries.
     * If getting session error and auto-login is enabled, then does new login and retries.
     *
     * @param string $resource
     * @param string $id
     * @param array|string $params
     * @param string $method
     * @return array
     * @throws ApiCriticalException
     * @throws ApiException
     * @throws \Exception
     */
    private function query($resource, $id=null, $params=null, $method=Client::METHOD_GET) {
        // set token, except for login query
        $headers = array();
        if ($resource != 'login') {
            $headers['Authorization'] = 'Bearer ' . $this->token;
        }
        if (empty($this->error_codes[($method==Client::METHOD_GET?'G/':'P/') . $resource])) {
            throw new ApiCriticalException('Unknown api resource: "'.$resource.'"');
        }
        // get query url
        $url = $this->getUrl($resource, $id);

        $json = null;
        for ($i=0; $i < self::THROTTLING_RETRIES; $i++) {
            // query
            $client = new Client($url, $params, $method, $headers);
            $last_run_time = microtime(true);

            // check http code
            $this->validateResponseCode($resource, $client, $method);

            // get response data
            $body = $client->getBody();
            $json = json_decode($body, true);
            try {
                $this->validateResponse($resource, $json, $method);
                return $json;
            } catch (ApiException $e) {
                $errors = $e->getErrors();
                foreach ($errors as $error) {
                    if ($error->Code == 429) {
                        // got throttling error, sleep and retry
                        usleep(1000000 - (microtime(true) - $last_run_time));
                        continue 2;
                    }
                }

                // no throttling error, throw whatever error we got
                throw $e;
            }
        }
    }
}


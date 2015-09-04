<?php

namespace Petslane\Bondora;

use Petslane\Bondora\Definition;

class Api {

    private $config = array();
    const API_VERSION = 1;

    /**
     * If set to true, then do auto-login and retry last api call on 401
     * @var bool
     */
    private $autologin = false;

    private $token;

    private $http_codes = array(
        200 => '(Success) The request was successfully processed',
        202 => '(Accepted) The submitted data was successfully accepted, but it might take time to process the data',
        400 => '(Bad Request) Expected data or parameter is not provided, is in wrong format or request size is too big',
        401 => '(Unauthorized) The Authorization Token is not provided or the Token is not valid anymore',
        403 => '(Forbidden) User is not allowed to access or modify the resource',
        404 => '(Not Found) Data with specified parameters or the resource is not found',
        405 => '(Method Not Allowed) Request method (POST, GET, etc.) is not allowed for the resource',
        409 => '(Conflict) There is conflict with the data provided',
        415 => '(Unsupported Media Type) Content-Type for request is not supported',
        429 => '(Too Many Requests) There are too many requests made in time frame. See Throttling section for more information.',
        500 => '(Internal Server Error) There was an unexpected error when processing the request',
    );
    private $error_codes = array(
        'login' => array(
            400 => 'Username or Password is not set',
            401 => 'User\'s email and password do not match',
            403 => 'API usage for the user is not allowed',
            404 => 'No user with specified email found',
            500 => 'Token creation for user failed or other error',
            429 => 'API calls quota exceeded! maximum admitted 1 per Second.',
        ),
        'logout' => array(
            401 => 'User is not Authorized',
            404 => 'The provided token is not found',
            409 => 'The provided token is already revoked or not valid anymore',
            500 => 'If the revoke of the token failed or some other internal error happened',
            429 => 'API calls quota exceeded! maximum admitted 1 per Second.',
        ),
        'auctions' => array(
            401 => 'User is not Authorized',
            429 => 'API calls quota exceeded! maximum admitted 1 per Second.',
        ),
        'auction' => array(
            400 => 'Auction ID is not provided',
            401 => 'User is not Authorized',
            404 => 'Auction with the provided ID was not found',
            429 => 'API calls quota exceeded! maximum admitted 1 per Second.',
        ),
        'userorganizations' => array(
            401 => 'User is not Authorized',
            429 => 'API calls quota exceeded! maximum admitted 1 per Second.',
        ),
        'bids' => array(
            401 => 'User is not Authorized',
            403 => 'User is not allowed to represent the specified organization',
            429 => 'API calls quota exceeded! maximum admitted 1 per Second.',
        ),
        'bid' => array(
            0 => 'tmp', // Bondora bug. Somehow all errorcodes from bid service have 0 value
            400 => 'No bids specified',
            401 => 'User is not Authorized',
            403 => 'User is not allowed to fully represent the specified organization',
            404 => 'Auction with specified ID is not found',
            429 => 'API calls quota exceeded! maximum admitted 1 per Second.',
        ),
    );

    public function __construct($config) {
        if (empty($config['url'])) {
            throw new \InvalidArgumentException('Missing "url" in config');
        }
        if (empty($config['username'])) {
            throw new \InvalidArgumentException('Missing "username" in config');
        }
        if (empty($config['password'])) {
            throw new \InvalidArgumentException('Missing "password" in config');
        }

        $this->config = $config;

        $this->autologin = !empty($config['autologin']);
    }

    /**
     * Get Api request url based on Api resource
     *
     * @param string $resource
     * @param string $path Path to be appended to url
     * @return string
     * @throws ApiCriticalException
     */
    private function getUrl($resource, $path=null) {
        if (empty($this->error_codes[$resource])) {
            throw new ApiCriticalException('Unknown api resource: "'.$resource.'"');
        }
        $url = $this->config['url'] . '/v' . self::API_VERSION . '/' . $resource;
        if ($path) {
            $url .= '/' . $path;
        }
        return $url;
    }

    /**
     * Validate Api resource name and Api response code
     *
     * @param string $resource
     * @param Client $client
     * @throws ApiCriticalException
     */
    private function validateResponseCode($resource, Client $client) {
        if (empty($this->error_codes[$resource])) {
            throw new ApiCriticalException('Unknown api method: "'.$resource.'"');
        }
        $http_code = $client->getHttpCode();
        if (!array_key_exists($http_code, $this->http_codes)) {
            throw new ApiCriticalException('Unexpected api http code ('.$http_code.') for resource "'.$resource.'"');
        }
    }

    /**
     * Throw ApiException on failed response
     *
     * @param string $resource
     * @param array $json
     * @throws ApiCriticalException
     * @throws ApiException
     */
    private function validateResponse($resource, $json) {
        if (!$json) {
            throw new ApiCriticalException('Missing response');
        }
        $result = new Definition\ApiResult($json);

        if (!$result->Success) {
            foreach ($result->Errors as $e) {
                if (isset($this->error_codes[$resource][$e->Code])) {
                    continue;
                }
                throw new ApiCriticalException('Unexpected error code ('.$e->Code.') for resource "'.$resource.'": ' . json_encode($result->Errors));
            }
            throw new ApiException($result->Errors);
        }
    }

    /**
     * Authenticate user with provided user credentials (username and password).
     *
     * @throws ApiCriticalException
     * @throws ApiException
     */
    public function login() {
        $resource = 'login';

        $userCred = new Definition\UserCredentials();
        $userCred->Username = $this->config['username'];
        $userCred->Password = $this->config['password'];

        $json = $this->query($resource, null, json_encode($userCred), Client::METHOD_POST);

        $response = new Definition\ApiResultAuthentication($json);

        $this->token = $response->Payload->Token;
    }

    /**
     * Revoke the current authorization token.
     *
     * @throws ApiCriticalException
     * @throws ApiException
     */
    public function logout() {
        $resource = 'logout';

        $client = new Client($this->getUrl($resource), null, Client::METHOD_POST, array(
            'Authorization' => 'Token ' . $this->token,
        ));

        $this->validateResponseCode($resource, $client);

        $body = $client->getBody();
        $json = json_decode($body, true);
        $this->validateResponse($resource, $json);

        $this->token = null;
    }

    /**
     * Gets list of active Auctions
     *
     * $request array supported keys:
     *     PageSize               int               Max returned results, default is 1000. Range: inclusive between 1 and 2000
     *     PageNr                 int               Result page nr. Range: inclusive between 1 and 2147483647
     *     Countries              string[]          Two letter iso code for country of origin: EE, ES, FI
     *     Ratings                string[]          Bondora's rating: AA, A, B, C, D, E, F, HR
     *     Gender                 int               Borrower's gender: Male 0, Female 1, Unknown 2
     *     SumMin                 int               Minimal loan amount
     *     SumMax                 int               Maximum loan amount
     *     Terms                  int[]             Loan length: 3, 9, 12, 18, 24, 36, 48, 60 months
     *     AgeMin                 int               Minimal age
     *     AgeMax                 int               Maximum age
     *     LoanNumber             int               Loan number
     *     UserName               string            Username
     *     ApplicationDateFrom    string|DateTime   Loan application started date from
     *     ApplicationDateTo      string|DateTime   Loan application started date to
     *     CreditScoreMin         int               Minimum credit score
     *     CreditScoreMax         int               Maximum credit score
     *     CreditGroups           string[]          Credit group
     *     InterestMin            float             Minimum interest
     *     InterestMax            float             Maximum interest
     *     IncomeTotalMin         float             Minimal total income
     *     IncomeTotalMax         float             Maximum total income
     *     ModelVersion           int               Model version
     *     ExpectedLossMin        float             Minimal expected loss
     *     ExpectedLossMax        float             Maximum expected loss
     *
     * @param array $request
     * @return Definition\Auction[]
     * @throws ApiCriticalException
     * @throws ApiException
     */
    public function auctions($request=array()) {
        $resource = 'auctions';

        $params = array();

        $array_fields = array(
            'Countries',
            'Ratings',
            'Terms',
            'CreditGroups',
        );
        $int_fields = array(
            'PageSize',
            'PageNr',
            'Gender',
            'SumMin',
            'SumMax',
            'AgeMin',
            'AgeMax',
            'LoanNumber',
            'CreditScoreMin',
            'CreditScoreMax',
            'ModelVersion',
        );
        $float_fields = array(
            'InterestMin',
            'InterestMax',
            'IncomeTotalMin',
            'IncomeTotalMax',
            'ExpectedLossMin',
            'ExpectedLossMax',
        );
        $string_fields = array(
            'UserName'
        );

        $all_fields = array_merge($int_fields, $float_fields, $string_fields);
        $all_fields = array_unique($all_fields);
        foreach ($all_fields as $fld_name) {
            if (!isset($request[$fld_name])) {
                continue;
            }
            if (!in_array($fld_name, $array_fields)) {
                if (isset($float_fields[$fld_name])) {
                    $params[$fld_name] = (float) $request[$fld_name];
                } else if (isset($string_fields[$fld_name])) {
                    $params[$fld_name] = (string) $request[$fld_name];
                } else if (isset($int_fields[$fld_name])) {
                    $params[$fld_name] = (int) $request[$fld_name];
                }
                continue;
            }

            if (!is_array($request[$fld_name])) {
                $request[$fld_name] = array($request[$fld_name]);
            }
            $params[$fld_name] = array();
            foreach ($request[$fld_name] as $value) {
                $params[$fld_name][] = (int) $value;
                if (isset($float_fields[$fld_name])) {
                    $params[$fld_name][] = (float) $value;
                } else if (isset($string_fields[$fld_name])) {
                    $params[$fld_name][] = (string) $value;
                } else if (isset($int_fields[$fld_name])) {
                    $params[$fld_name][] = (int) $value;
                }
            }
            $params[$fld_name] = implode(',', $params[$fld_name]);
        }

        $date_fields = array(
            'ApplicationDateFrom',
            'ApplicationDateTo',
        );
        foreach ($date_fields as $fld_name) {
            if (!isset($request[$fld_name])) {
                continue;
            }
            $request_value = $request[$fld_name];
            if (is_string($request_value)) {
                $params[$fld_name] = (string) $request_value;
            } else if ($request_value instanceof \DateTime) {
                $params[$fld_name] = $request_value->format('d.m.Y');
            }
        }

        $json = $this->query($resource, null, $params);

        $response = new Definition\ApiResultAuctions($json);

        return $response->Payload;
    }

    /**
     * Gets Auction info by auction identifier
     *
     * @param $auction_id
     * @return Definition\Auction
     * @throws ApiCriticalException
     * @throws ApiException
     */
    public function auction($auction_id) {
        $resource = 'auction';

        $json = $this->query($resource, $auction_id);

        $response = new Definition\ApiResultAuction($json);

        return $response->Payload;
    }

    /**
     * Get user's represented Organizations.
     *
     * @return Definition\UserOrganization[]
     * @throws ApiCriticalException
     * @throws ApiException
     */
    public function userorganizations() {
        $resource = 'userorganizations';

        $json = $this->query($resource);

        $response = new Definition\ApiResultUserOrganizations($json);

        return $response->Payload;
    }

    /**
     * Gets list of bids the investor has made.
     *
     * @param int $bidStatus Bid status (pending, failed, succeeded)
     * @param string|\DateTime $startDate Bids made from date. Format DD.MM.YYYY
     * @param string|\DateTime $endDate Bids made to date. Format DD.MM.YYYY
     * @param string $organizationId The represented organization id. Don't specify if getting list for current user. globally unique identifier.
     * @return Definition\BidSummary[]
     * @throws ApiCriticalException
     * @throws ApiException
     */
    public function bids($bidStatus=null, $startDate=null, $endDate=null, $organizationId=null) {
        $resource = 'bids';

        $params = array();
        if ($bidStatus) {
            $params['bidStatus'] = (int) $bidStatus;
        }
        if (is_string($startDate)) {
            $params['startDate'] = $startDate;
        } else if ($startDate instanceof \DateTime) {
            $params['startDate'] = $startDate->format('d.m.Y');
        }
        if (is_string($endDate)) {
            $params['endDate'] = $endDate;
        } else if ($endDate instanceof \DateTime) {
            $params['endDate'] = $endDate->format('d.m.Y');
        }
        if ($organizationId) {
            $params['organizationId'] = $organizationId;
        }

        $json = $this->query($resource, null, $params);

        $response = new Definition\ApiResultBids($json);

        return $response->Payload;
    }

    /**
     * Makes bid(s) into specified auction(s).
     *
     * @param Definition\Bid[] $Bids The bids to make.
     * @param string $OrganizationId Organization to make bid for. Specify this if the Bid is made in behalf of the Organization. No need to specify if the bid is made for current user.
     * @return bool
     * @throws ApiCriticalException
     * @throws ApiException
     */
    public function bid($Bids, $OrganizationId = null) {
        $resource = 'bid';

        $bidReq = new Definition\BidRequest();
        if ($OrganizationId) {
            $bidReq->OrganizationId = $OrganizationId;
        }
        if (!$Bids) {
            return false;
        }
        if (!is_array($Bids)) {
            $Bids = array($Bids);
        }
        $bidReq->Bids = $Bids;

        $this->query($resource, null, json_encode($bidReq), Client::METHOD_POST);

        return true;
    }

    /**
     * Query data.
     * If getting throttling error, then sleeps and retries.
     * If getting session error and auto-login is enabled, then does new login and retries.
     *
     * @param string $resource
     * @param string $path
     * @param array|string $params
     * @param string $method
     * @return array
     * @throws ApiCriticalException
     * @throws ApiException
     * @throws \Exception
     */
    private function query($resource, $path=null, $params=null, $method=Client::METHOD_GET) {
        // set token, except for login query
        $headers = array();
        if ($resource != 'login') {
            $headers['Authorization'] = 'Token ' . $this->token;
        }
        // get query url
        $url = $this->getUrl($resource, $path);
        // query
        $client = new Client($url, $params, $method, $headers);
        $last_run_time = microtime(true);

        // check http code
        $this->validateResponseCode($resource, $client);

        // get response data
        $body = $client->getBody();
        $json = json_decode($body, true);
        try {
            $this->validateResponse($resource, $json);
        } catch (ApiException $e) {
            // response was not successful
            $do_retry = false;
            $has_session_problem = false;
            $has_throttling_problem = false;

            // was there any errors we can handle automatically
            $errors = $e->getErrors();
            foreach ($errors as $error) {
                if (in_array($error->Code, array(401, 403))) {
                    $has_session_problem = true;
                }
                if ($error->Code == 429) {
                    $has_throttling_problem = true;
                }
            }

            // has session problem and auto-login is enabled
            if ($has_session_problem && $this->autologin && $resource != 'login' && $resource != 'logout') {
                usleep(1000000 - (microtime(true) - $last_run_time)); // avoid throttling limit
                $this->login();
                $last_run_time = microtime(true);
                $do_retry = true;
                $this->autologin = false;
            }

            // has throttling problem, lets wait a second and retry again
            if ($has_throttling_problem) {
                sleep(1);
                $do_retry = true;
            }

            if ($do_retry) {
                // retry query
                usleep(1000000 - (microtime(true) - $last_run_time));
                if ($resource != 'login') { // update token in case we did new login
                    $headers['Authorization'] = 'Token ' . $this->token;
                }
                $client = new Client($url, $params, $method, $headers);
                $this->validateResponseCode($resource, $client);
                $body = $client->getBody();
                $json = json_decode($body, true);
                $this->validateResponse($resource, $json);
            } else {
                // contains errors we can't handle automatically, throw this
                throw $e;
            }
        }

        return $json;
    }
}


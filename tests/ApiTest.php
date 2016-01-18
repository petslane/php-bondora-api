<?php

require __DIR__ . '/../bondoraApi.php';

use Petslane\Bondora;

class ApiTest extends PHPUnit_Framework_TestCase {

    private $config;
    /** @var Bondora\Api */
    private $api;

    public function setUp() {
        global $config;
        $this->config = $config;
        $this->api = new Bondora\Api($config['api']);
        $this->api->setToken($config['token']);
    }

    /**
     * @dataProvider methodProvider
     * @expectedException Petslane\Bondora\ApiException
     * @expectedExceptionMessage Api responded with errors: 401 - Invalid token - Request the Access Token from /oauth/access_token endpoint and set the issued token to 'Authorization' header as 'Bearer {access_token}'.
     */
    public function testInvalidToken($method, $args) {
        $this->api->setToken('invalid-token-bla-bla');
        call_user_func_array(array($this->api, $method), $args);
    }

    /**
     * @dataProvider methodProvider
     * @expectedException Petslane\Bondora\ApiException
     * @expectedExceptionMessage Api responded with errors: 401 - Missing token - Request the Access Token from /oauth/access_token endpoint and set the issued token to 'Authorization' header as 'Bearer {access_token}'.
     */
    public function testMissingToken($method, $args) {
        $this->api->setToken('');
        call_user_func_array(array($this->api, $method), $args);
    }

    /**
     * @dataProvider wrongReportTypesProvider
     * @expectedException Petslane\Bondora\ApiException
     * @expectedExceptionMessageRegExp /^Api responded with errors: 400 - Report Type '\d+' is not supported - ;$/
     */
    public function testWrongReportType($wrongType) {
        // sleep, to avoid API calls quota exceeded error
        sleep(1);

        $this->api->createReport($wrongType);
    }

    /**
     * @dataProvider reportTypesProvider
     */
    public function testReports($type, $resultType) {
        $resultType = '\\Petslane\\Bondora\\Definition\\' . $resultType;
        // sleep, to avoid API calls quota exceeded error
        sleep(1);

        // generate report
        $reportResponse = $this->api->createReport($type);

        $timeoutOn = time() + 30; // report should be generated within this time, if not, throw error
        while (true) {
            try {
                sleep(1);
                $report = $this->api->report($reportResponse->ReportId);
            } catch (Bondora\ApiException $e) {
                if (time() > $timeoutOn) {
                    throw new Exception("Waited too log to report {$type} with id {$reportResponse->ReportId} to generate");
                }
                // if we get report not fount error, then wait a little until report is generated
                foreach ($e->getErrors() as $error) {
                    if ($error->Code == 404 && $error->Message == 'Report with Id ' . $reportResponse->ReportId . ' is not found') {
                        continue 2;
                    }
                }
                throw $e;
            }
            break;
        }

        $this->assertGreaterThan(0, count($report->Result), 'Got no result lines');

        foreach ($report->Result as $resultLines) {
            $this->assertTrue($resultLines instanceof $resultType, 'Wrong result type for report');
        }


    }

    /**
     * @dataProvider invalidConfigProvider
     * @expectedException \InvalidArgumentException
     */
    public function testConstruct($config) {
        new Bondora\Api($config);
    }

    /* ******************** Data providers ******************** */

    public function invalidConfigProvider() {
        return array(
            array(
                'auth' => array(
                    'client_id' => 'bla',
                    'secret' => 'bla',
                    'scope' => 'bla',
                ),
                'api_base' => 'bla',
            ),
            array(
                'auth' => array(
                    'url_base' => 'bla',
                    'secret' => 'bla',
                    'scope' => 'bla',
                ),
                'api_base' => 'bla',
            ),
            array(
                'auth' => array(
                    'url_base' => 'bla',
                    'client_id' => 'bla',
                    'scope' => 'bla',
                ),
                'api_base' => 'bla',
            ),
            array(
                'auth' => array(
                    'url_base' => 'bla',
                    'client_id' => 'bla',
                    'secret' => 'bla',
                ),
                'api_base' => 'bla',
            ),
            array(
                'auth' => array(
                    'url_base' => 'bla',
                    'client_id' => 'bla',
                    'secret' => 'bla',
                    'scope' => 'bla',
                ),
            ),
        );
    }

    public function methodProvider() {
        return array(
            array('accountBalance', array()),
            array('accountInvestments', array()),
            array('auction', array(123)),
            array('auctions', array(array())),
            array('bid', array(123)),
            array('bidCancel', array(123)),
            array('bidPost', array(array(new Bondora\Definition\Bid()))),
            array('bids', array()),
//            array('getAuthUrl', array()),
            array('getEventlog', array()),
//            getToken
            array('loandataset', array()),
            array('loanpart', array(123)),
//            array('revokeToken', array()),
//            refreshToken
            array('revokeToken', array()),
            array('secondaryMarket', array()),
            array('secondaryMarketBuy', array(123)),
            array('secondaryMarketById', array(123)),
            array('secondaryMarketCancel', array(123)),
            array('secondaryMarketSell', array(array(new Bondora\Definition\SecondMarketSell()))),
            array('reports', array()),
            array('report', array(123)),
            array('createReport', array(6)),
        );
    }

    public function reportTypesProvider() {
        return array(
            array(Bondora\Enum\ReportType::AccountStatement, 'AccountStatementReportLine'),
            array(Bondora\Enum\ReportType::Investments, 'InvestmentsListReportLine'),
            array(Bondora\Enum\ReportType::PlannedFutureCashflows, 'FutureCashflowsReportLine'),
            array(Bondora\Enum\ReportType::Repayments, 'RepaymentsReportLine'),
            array(Bondora\Enum\ReportType::SecondMarketArchive, 'SecondMarketArchiveReportLine'),
        );
    }

    public function wrongReportTypesProvider() {
        return array(
            array(0),
            array(1),
            array(5),
            array(8),
            array(9),
            array(10),
            array(11),
            array(12),
            array(13),
            array(14),
            array(15),
        );
    }

}

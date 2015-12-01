<?php

namespace Petslane\Bondora\Definition;

/**
 * Request object for filtering auctions
 */
class AuctionRequest extends Definition {

    /**
     * Two letter iso code for country of origin: EE, ES, FI
     *
     * @var string[]
     */
    public $Countries;


    /**
     * Bondora's rating: AA, A, B, C, D, E, F, HR
     *
     * @var string[]
     */
    public $Ratings;


    /**
     * Borrower's gender: Male 0, Female 1, Unknown 2
     *
     * @var int
     */
    public $Gender;


    /**
     * Minimal loan amount
     *
     * @var int
     */
    public $SumMin;


    /**
     * Maximum loan amount
     *
     * @var int
     */
    public $SumMax;


    /**
     * Loan length: 3, 9, 12, 18, 24, 36, 48, 60 months
     *
     * @var int[]
     */
    public $Terms;


    /**
     * Minimal age
     *
     * @var int
     */
    public $AgeMin;


    /**
     * Maximum age
     *
     * @var int
     */
    public $AgeMax;


    /**
     * Loan number
     *
     * @var int
     */
    public $LoanNumber;


    /**
     * Username
     *
     * @var string
     */
    public $UserName;


    /**
     * Loan application started date from
     *
     * @var \DateTime
     */
    public $ApplicationDateFrom;


    /**
     * Loan application started date to
     *
     * @var \DateTime
     */
    public $ApplicationDateTo;


    /**
     * Minimum credit score
     *
     * @var int
     */
    public $CreditScoreMin;


    /**
     * Maximum credit score
     *
     * @var int
     */
    public $CreditScoreMax;


    /**
     * Minimum interest
     *
     * @var float
     */
    public $InterestMin;


    /**
     * Maximum interest
     *
     * @var float
     */
    public $InterestMax;


    /**
     * Minimal total income
     *
     * @var float
     */
    public $IncomeTotalMin;


    /**
     * Maximum total income
     *
     * @var float
     */
    public $IncomeTotalMax;


    /**
     * Model version
     *
     * @var int
     */
    public $ModelVersion;


    /**
     * Minimal expected loss
     *
     * @var float
     */
    public $ExpectedLossMin;


    /**
     * Maximum expected loss
     *
     * @var float
     */
    public $ExpectedLossMax;


    /**
     * Date when auction was published from
     *
     * @var \DateTime
     */
    public $ListedOnUTCFrom;


    /**
     * Date when auction was published to
     *
     * @var \DateTime
     */
    public $ListedOnUTCTo;


    /**
     * Max returned results, default is 1000
     *
     * Minimum value: 1
     * Maximum value: 1000
     *
     * @var int
     */
    public $PageSize;


    /**
     * Result page nr
     *
     * Minimum value: 1
     * Maximum value: 2147483647
     *
     * @var int
     */
    public $PageNr;

}


<?php

namespace Petslane\Bondora\Definition;

/**
 * Request parameters for getting loan data
 */
class LoanDatasetRequest extends Definition {

    /**
     * Specific loans to search
     *
     * @var string[]
     */
    public $LoanIds;


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
     * Loan was funded
     *
     * @var bool
     */
    public $WasFunded;


    /**
     * Loan start date from
     *
     * @var \DateTime
     */
    public $LoanDateFrom;


    /**
     * Loan start date to
     *
     * @var \DateTime
     */
    public $LoanDateTo;


    /**
     * Max items in result, default is 1000
     *
     * Minimum value: 1
     * Maximum value: 10000
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


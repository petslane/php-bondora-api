<?php

namespace Petslane\Bondora\Definition;

/**
 * Request object for filtering api bids
 */
class ApiBidSummariesRequest extends Definition {

    /**
     * Bid status code
     *
     * Enum: 0, 1, 2, 3, 4
     *
     * @var int
     */
    public $BidStatusCode;


    /**
     * Start date
     *
     * @var \DateTime
     */
    public $StartDate;


    /**
     * End date
     *
     * @var \DateTime
     */
    public $EndDate;


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


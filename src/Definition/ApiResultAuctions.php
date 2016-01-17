<?php

namespace Petslane\Bondora\Definition;

/**
 * Response for Auctions endpoint
 */
class ApiResultAuctions extends Definition {

    /**
     * Requested Max items in result
     *
     * Maximum value: 2147483647
     *
     * @var int
     */
    public $PageSize;


    /**
     * Requested page nr
     *
     * Minimum value: 1
     * Maximum value: 2147483647
     *
     * @var int
     */
    public $PageNr;


    /**
     * Total number of items found
     *
     * Maximum value: 2147483647
     *
     * @required
     * @var int
     */
    public $TotalCount;


    /**
     * Number of items returned
     *
     * Maximum value: 2147483647
     *
     * @required
     * @var int
     */
    public $Count;


    /**
     * The payload of the response. Type depends on the API request.
     *
     * @var Auction[]
     */
    public $Payload;


    /**
     * Indicates if the request was successfull or not.
     * true if the request was handled successfully, false otherwise.
     *
     * @required
     * @var bool
     */
    public $Success;


    /**
     * Error(s) accociated with the API request.
     *
     * @var ApiError[]
     */
    public $Errors;

}


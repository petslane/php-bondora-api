<?php

namespace Petslane\Bondora\Definition;

class ApiResultBid extends Definition {

    /**
     * The payload of the response. Type depends on the API request.
     *
     * @var BidSummary
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


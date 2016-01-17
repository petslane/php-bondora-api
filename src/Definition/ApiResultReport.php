<?php

namespace Petslane\Bondora\Definition;

class ApiResultReport extends Definition {

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
     * @var Report
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


<?php

namespace Petslane\Bondora\Definition;

/**
 * Request object for filtering event log
 */
class EventLogRequest extends Definition {

    /**
     * Start datetime
     *
     * @var \DateTime
     */
    public $EventDateFrom;


    /**
     * end datetime
     *
     * @var \DateTime
     */
    public $EventDateTo;


    /**
     * Event type
     *
     * Enum: 1, 2, 3, 4, 5
     *
     * @var int
     */
    public $EventType;


    /**
     * IP address
     *
     * @var string
     */
    public $IpAddress;


    /**
     * Max items in result, default is 1000
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


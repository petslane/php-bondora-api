<?php

namespace Petslane\Bondora\Definition;

/**
 * EventLog list item's information
 */
class EventLogItem extends Definition {

    /**
     * Event date
     *
     * @var \DateTime
     */
    public $EventDate;


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
     * Request data JSON format
     *
     * @var string
     */
    public $Data;

}


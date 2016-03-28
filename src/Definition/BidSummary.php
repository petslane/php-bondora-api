<?php

namespace Petslane\Bondora\Definition;

/**
 * Bid's information
 */
class BidSummary extends Definition {

    /**
     * Bid unique identifier
     *
     * @var string
     */
    public $Id;


    /**
     * Id of auction to bid into
     *
     * @var string
     */
    public $AuctionId;


    /**
     * Amount that was requested to bid
     *
     * @var float
     */
    public $RequestedBidAmount;


    /**
     * Amount that is bidded
     *
     * @var float
     */
    public $ActualBidAmount;


    /**
     * Minimum amount that was specified for auction
     *
     * @var float
     */
    public $RequestedBidMinimumLimit;


    /**
     * When bid was requested
     *
     * @var \DateTime
     */
    public $BidRequestedDate;


    /**
     * When bid was processed
     *
     * @var \DateTime
     */
    public $BidProcessedDate;


    /**
     * Is request currently processed
     *
     * @var bool
     */
    public $IsRequestBeingProcessed;


    /**
     * Status of bid
     *     0 Pending
     *     1 Open
     *     2 Successful
     *     3 Failed
     *     4 Cancelled
     *     5 Accepted
     *
     * Enum: 0, 1, 2, 3, 4, 5
     *
     * @var int
     */
    public $StatusCode;


    /**
     * Why bid failed
     *
     * Enum: 0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14
     *
     * @var int
     */
    public $FailureReason;

}


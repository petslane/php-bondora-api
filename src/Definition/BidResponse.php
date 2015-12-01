<?php

namespace Petslane\Bondora\Definition;

class BidResponse extends Definition {

    /**
     * Item unique identifier
     *
     * @var string
     */
    public $Id;


    /**
     * Auction unique identifier
     *
     * @var string
     */
    public $AuctionId;


    /**
     * Amount to bid into Auction
     *
     * @var float
     */
    public $Amount;


    /**
     * Minimum bid to make into auction.
     * If the available amount to invest into loan is less than specified minimum limit,
     * the investment into the auction's loan is not made.
     *
     * @var float
     */
    public $MinAmount;

}


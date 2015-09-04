<?php

namespace Petslane\Bondora\Definition;

/**
 * Bid to make into Auction.
 */
class Bid extends Definition {

    /**
     * The Auction's ID to bid to.
     *
     * @required
     * @var string
     */
    public $AuctionId;


    /**
     * Amount to bid into Auction
     *
     * Minimum value: 5
     * Maximum value: 2147483647
     *
     * @required
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


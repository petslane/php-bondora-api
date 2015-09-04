<?php

namespace Petslane\Bondora\Definition;

/**
 * Bid's information
 */
class BidSummary extends Definition {

    const BidFailureReason_NotSet = 0;
    const BidFailureReason_AvailableAmountLowerThanMinInvestmentLimit = 1;
    const BidFailureReason_BiddingOnOwnAuction = 2;
    const BidFailureReason_BiddingOnInactiveDuplicate = 3;
    const BidFailureReason_BiddingAmountTooSmall = 4;
    const BidFailureReason_NotEnoughBalance = 5;
    const BidFailureReason_AuctionIsClosed = 6;
    const BidFailureReason_AuctionStatusNotOpen = 7;
    const BidFailureReason_NoRiskScoreForAuction = 8;
    const BidFailureReason_AuctionAlreadyFullyBidded = 9;
    const BidFailureReason_AuctionNotFound = 10;
    const BidFailureReason_NotEnoughLoanAmountForBiddingAmount = 11;
    const BidFailureReason_ApiUsageNotAllowed = 12;
    const BidFailureReason_AuctionIsCancelled = 13;
    const BidFailureReason_Unknown = 14;

    const Status_Pending = 0;
    const Status_Open = 1;
    const Status_Successful = 2;
    const Status_Failed = 3;

    /**
     * Id of auction bidded
     *
     * @var string
     */
    public $AuctionId;


    /**
     * amount that is requested to bid
     *
     * @var float
     */
    public $RequestedBidAmount;


    /**
     * amount that is bidded
     *
     * @var float
     */
    public $ActualBidAmount;


    /**
     * minimum amount that can be bidded for this auction
     *
     * @var float
     */
    public $RequestedBidMinimumLimit;


    /**
     * status of bid
     *
     * Enum: 0, 1, 2, 3
     *
     * @var int
     */
    public $Status;


    /**
     * when bid is requested via API
     *
     * @var \DateTime
     */
    public $BidRequestedDate;


    /**
     * when bid is placed by autobidder
     *
     * @var \DateTime
     */
    public $BidProcessedDate;


    /**
     * why bid failed
     *
     * Enum: 0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14
     *
     * @var int
     */
    public $BidFailureReason;

}


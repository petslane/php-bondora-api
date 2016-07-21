<?php

namespace Petslane\Bondora\Enum;

class ApiAuctionBidRequestStatus {

    /** Bid request is created, but it's not processed yet. */
    const Pending = 0;

    /** The bid is made into Auction, but the Auction is still open. */
    const Open = 1;

    /** The bid is made and the Auction is succesfully ended (user has accepted the loan offer). */
    const Successful = 2;

    /** Bid to the Auction failed or the Action was canceled. */
    const Failed = 3;

    /** User has canceled the Bid request. */
    const Cancelled = 4;

    /** Bid has been accepted. */
    const Accepted = 5;

}

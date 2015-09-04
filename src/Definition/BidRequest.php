<?php

namespace Petslane\Bondora\Definition;

/**
 * Bids to make for the user or user represented organization.
 */
class BidRequest extends Definition {

    /**
     * Organization to make bid for.
     * Specify this if the Bid is made in behalf of the Organization.
     * No need to specify if the bid is made for current user.
     *
     * @var string
     */
    public $OrganizationId;


    /**
     * The bids to make.
     *
     * @required
     * @var Bid[]
     */
    public $Bids;

}


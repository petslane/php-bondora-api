<?php

namespace Petslane\Bondora\Definition;

/**
 * My account balance information
 */
class MyAccountBalance extends Definition {

    /**
     * Account balance
     *
     * @var float
     */
    public $Balance;


    /**
     * Account reserved amount
     *
     * @var float
     */
    public $Reserved;


    /**
     * Api pending auction bid request amount
     *
     * @var float
     */
    public $BidRequestAmount;


    /**
     * Available balance
     *
     * @var float
     */
    public $TotalAvailable;

}


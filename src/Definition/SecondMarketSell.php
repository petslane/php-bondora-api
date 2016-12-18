<?php

namespace Petslane\Bondora\Definition;

/**
 * Sell loan on secondary market.
 */
class SecondMarketSell extends Definition {

    /**
     * LoanPart unique identifier
     *
     * @var string
     */
    public $LoanPartId;


    /**
     * Desired discount rate
     *
     * Minimum value: -100
     * Maximum value: 40
     *
     * @var int
     */
    public $DesiredDiscountRate;

}


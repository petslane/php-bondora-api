<?php

namespace Petslane\Bondora\Definition;

class SecondMarketSaleResponse extends Definition {

    /**
     * Item unique identifier
     *
     * @var string
     */
    public $Id;


    /**
     * Secondary market item unique identifier
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


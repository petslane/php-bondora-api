<?php

namespace Petslane\Bondora\Definition;

/**
 * Borrower's debt
 */
class Debt extends Definition {

    /**
     * Start
     *
     * @var \DateTime
     */
    public $StartDate;


    /**
     * End
     *
     * @var \DateTime
     */
    public $EndDate;


    /**
     * Amount
     *
     * @var string
     */
    public $Amount;


    /**
     * Max amount
     *
     * @var string
     */
    public $MaxAmount;


    /**
     * Industry
     *
     * @var string
     */
    public $Industry;


    /**
     * Reporter
     *
     * @var string
     */
    public $Reporter;

}


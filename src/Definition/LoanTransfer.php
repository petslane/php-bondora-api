<?php

namespace Petslane\Bondora\Definition;

class LoanTransfer extends Definition {

    /**
     * Payment date
     *
     * @var \DateTime
     */
    public $Date;


    /**
     * Principal amount
     *
     * @var float
     */
    public $PrincipalAmount;


    /**
     * Interest amount
     *
     * @var float
     */
    public $InterestAmount;


    /**
     * Interest carried over amount
     *
     * @var float
     */
    public $InterestAmountCarriedOver;


    /**
     * Penalty amount
     *
     * @var float
     */
    public $PenaltyAmountCarriedOver;


    /**
     * Total amount
     *
     * @var float
     */
    public $TotalAmount;

}


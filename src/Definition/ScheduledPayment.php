<?php

namespace Petslane\Bondora\Definition;

/**
 * Scheduled payment item information
 */
class ScheduledPayment extends Definition {

    /**
     * Scheduled payment date
     *
     * @var \DateTime
     */
    public $ScheduledDate;


    /**
     * Scheduled principal amount
     *
     * @var float
     */
    public $PrincipalAmount;


    /**
     * Scheduled principal amount remaining after payment
     *
     * @var float
     */
    public $PrincipalAmountLeft;


    /**
     * Scheduled interest amount
     *
     * @var float
     */
    public $InterestAmount;


    /**
     * Interest amount carried over from rescheduling
     *
     * @var float
     */
    public $IntrestAmountCarriedOver;


    /**
     * Penalty amount carried over from rescheduling
     *
     * @var float
     */
    public $PenaltyAmountCarriedOver;


    /**
     * @var float
     */
    public $TotalAmount;

}


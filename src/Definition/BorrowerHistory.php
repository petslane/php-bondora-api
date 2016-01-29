<?php

namespace Petslane\Bondora\Definition;

/**
 * Borrower's history
 */
class BorrowerHistory extends Definition {

    /**
     * Borrower's current overdue amount
     *
     * @var float
     */
    public $Overdue;


    /**
     * Borrower's total principal repaid
     *
     * @var float
     */
    public $PrincipalRepaid;


    /**
     * Borrower's total interest paid
     *
     * @var float
     */
    public $InterestRepaid;


    /**
     * Borrower's total late charges paid
     *
     * @var float
     */
    public $LateChargesRepaid;


    /**
     * Borrower's total repaiments
     *
     * @var float
     */
    public $RepaimentsTotal;


    /**
     * Borrower's issued loans count
     *
     * @var int
     */
    public $IssuedLoans;


    /**
     * Borrower's issued loans amount
     *
     * @var float
     */
    public $IssuedLoanAmount;

}


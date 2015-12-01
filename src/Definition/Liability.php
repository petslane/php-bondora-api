<?php

namespace Petslane\Bondora\Definition;

/**
 * Borrower's liability
 */
class Liability extends Definition {

    /**
     * Is refinanced
     *
     * @var bool
     */
    public $IsRefinanced;


    /**
     * Type of liability
     *
     * Enum: 0, 1, 2, 3, 4, 5, 6, 7, 101, 102, 103, 104, 105, 106, 107
     *
     * @var int
     */
    public $TypeOfLiability;


    /**
     * Creditor
     *
     * @var string
     */
    public $Creditor;


    /**
     * Monthly payment
     *
     * @var float
     */
    public $MonthlyPayment;


    /**
     * Outstanding
     *
     * @var float
     */
    public $Outstanding;


    /**
     * Type of collateral
     *
     * Enum: 0, 1, 2, 3, 4, 5, 6, 7
     *
     * @var int
     */
    public $CollateralType;

}


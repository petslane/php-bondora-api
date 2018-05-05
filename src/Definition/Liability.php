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
     * @deprecated 1.0.2.2 Obsolete: Not used actively anymore
     */
    public $IsRefinanced;


    /**
     * Type of liability
     *
     * Enum: 0, 1, 2, 3, 4, 5, 6, 7, 101, 102, 103, 104, 105, 106, 107
     *
     * @var int
     * @deprecated 1.0.2.2 Obsolete: Not used actively anymore
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
     * @deprecated 1.0.2.2 Obsolete: Not used actively anymore
     */
    public $Outstanding;


    /**
     * Type of collateral
     *
     * Enum: 0, 1, 2, 3, 4, 5, 6, 7
     *
     * @var int
     * @deprecated 1.0.2.2 Obsolete: Not used actively anymore
     */
    public $CollateralType;

}


<?php

namespace Petslane\Bondora\Definition;

class AccountStatementReportLine extends Definition {

    /**
     * @var \DateTime
     */
    public $TransferDate;

    /**
     * @var string
     */
    public $Currency;

    /**
     * @var float
     */
    public $Amount;

    /**
     * @var int
     */
    public $Number;

    /**
     * @var string
     */
    public $Description;

    /**
     * @var string
     */
    public $LoanNumber;

    /**
     * @var string
     */
    public $Counterparty;

    /**
     * @var float
     */
    public $BalanceAfterPayment;

}


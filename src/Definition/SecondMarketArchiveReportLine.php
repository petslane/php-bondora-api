<?php

namespace Petslane\Bondora\Definition;

class SecondMarketArchiveReportLine extends Definition {

    /**
     * @var string
     */
    public $LoanId;

    /**
     * @var string
     */
    public $LoanPartId;

    /**
     * @var \DateTime
     */
    public $StartDate;

    /**
     * @var \DateTime
     */
    public $EndDate;

    /**
     * @var string
     */
    public $Result;

    /**
     * @var float
     */
    public $DiscountRate;

    /**
     * @var int
     */
    public $DebtDaysAtStart;

    /**
     * @var int
     */
    public $DebtDaysAtEnd;

    /**
     * @var float
     */
    public $PrincipalAtStart;

    /**
     * @var float
     */
    public $PrincipalAtEnd;

}


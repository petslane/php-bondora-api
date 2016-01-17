<?php

namespace Petslane\Bondora\Definition;

class FutureCashflowsReportLine extends Definition {

    /** @var string */
    public $LoanId;

    /** @var string */
    public $LoanPartId;

    /** @var \DateTime */
    public $Date;

    /** @var float */
    public $PrincipalRepayment;

    /** @var float */
    public $InterestRepayment;

    /** @var float */
    public $RescheduledAccruedInterest;

    /** @var float */
    public $RescheduledLateFees;

}


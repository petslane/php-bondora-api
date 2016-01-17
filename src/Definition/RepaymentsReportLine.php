<?php

namespace Petslane\Bondora\Definition;

class RepaymentsReportLine extends Definition {

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
    public $LateFeesRepayment;

}


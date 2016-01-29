<?php

namespace Petslane\Bondora\Definition;

class ReportCreateRequest extends Definition {

    /**
     * Enum: 1, 2, 3, 4, 5, 6, 7
     * @see \Petslane\Bondora\Enum\ReportType
     *
     * @required
     * @var int
     */
    public $ReportType;


    /**
     * @var \DateTime
     */
    public $PeriodStart;


    /**
     * @var \DateTime
     */
    public $PeriodEnd;

}


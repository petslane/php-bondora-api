<?php

namespace Petslane\Bondora\Definition;

/**
 * Generec Report data
 */
class ReportItem extends Definition {

    /**
     * Reports unique identifier
     *
     * @var string
     */
    public $ReportId;


    /**
     * Report created date
     *
     * @var \DateTime
     */
    public $CreatedOn;


    /**
     * Report generated date. null if report is still generating
     *
     * @var \DateTime
     */
    public $GeneratedOn;


    /**
     * Report period end date
     *
     * @var \DateTime
     */
    public $PeriodStart;


    /**
     * Report period start date
     *
     * @var \DateTime
     */
    public $PeriodEnd;


    /**
     * Report's type
     *
     * Enum: 1, 2, 3, 4, 5, 6, 7
     * @see \Petslane\Bondora\Enum\ReportType
     *
     * @var int
     */
    public $ReportType;

}


<?php

namespace Petslane\Bondora\Definition;

/**
 * Report data with data rows
 */
class Report extends Definition {

    /**
     * List of Report items. Item type depends on ReportType value:
     *  ReportType::SecondMarketArchive -> SecondMarketArchiveReportLine[]
     *  ReportType::AccountStatement -> AccountStatementReportLine[]
     *  ReportType::Repayments -> RepaymentsReportLine[]
     *  ReportType::Investments -> InvestmentsListReportLine[]
     *  ReportType::PlannedFutureCashflows -> FutureCashflowsReportLine[]
     *  ReportType::InvestmentsV2 -> InvestmentsListReportLineV2[]
     *
     * Only set if report is generated. GeneratedOn field is null if report is not ready.
     *
     * @var SecondMarketArchiveReportLine[]|AccountStatementReportLine[]|RepaymentsReportLine[]|InvestmentsListReportLine[]|FutureCashflowsReportLine[]|InvestmentsListReportLineV2[]
     */
    public $Result;


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
     * Enum: 1, 2, 3, 4, 5, 6, 7, 8
     * @see \Petslane\Bondora\Enum\ReportType
     *
     * @var int
     */
    public $ReportType;

}


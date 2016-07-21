<?php

namespace Petslane\Bondora\Enum;

class ReportType {

    /**
     * Investments report
     * @deprecated
     */
    const Investments = 2;

    /** Planned future cashflows report */
    const PlannedFutureCashflows = 3;

    /** Repayments report */
    const Repayments = 4;

    /** Secondary Market archive */
    const SecondMarketArchive = 6;

    /** Account Statement */
    const AccountStatement = 7;

    /** Investments report V2 */
    const InvestmentsV2 = 8;
}


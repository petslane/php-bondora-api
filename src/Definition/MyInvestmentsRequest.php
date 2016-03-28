<?php

namespace Petslane\Bondora\Definition;

/**
 * Request object for filtering my investments
 */
class MyInvestmentsRequest extends Definition {

    /**
     * Loan issued start date from
     *
     * @var \DateTime
     */
    public $LoanIssuedDateFrom;


    /**
     * Loan issued start date to
     *
     * @var \DateTime
     */
    public $LoanIssuedDateTo;


    /**
     * Remaining principal amount min
     *
     * @var float
     */
    public $PrincipalMin;


    /**
     * Remaining principal amount max
     *
     * @var float
     */
    public $PrincipalMax;


    /**
     * Interest rate min
     *
     * @var float
     */
    public $InterestMin;


    /**
     * Interest rate max
     *
     * @var float
     */
    public $InterestMax;


    /**
     * Loan lenght min
     *
     * @var int
     */
    public $LengthMax;


    /**
     * Loan lenght max
     *
     * @var int
     */
    public $LengthMin;


    /**
     * Principal debt amount min
     *
     * @var float
     */
    public $LatePrincipalAmountMin;


    /**
     * Principal debt amount max
     *
     * @var float
     */
    public $LatePrincipalAmountMax;


    /**
     * Principal debt started date from
     *
     * @var \DateTime
     */
    public $DebtOccuredOnFrom;


    /**
     * Principal debt started date to
     *
     * @var \DateTime
     */
    public $DebtOccuredOnTo;


    /**
     * Interest debt started date from
     *
     * @var \DateTime
     */
    public $DebtOccuredOnForSecondaryFrom;


    /**
     * Interest debt started date to
     *
     * @var \DateTime
     */
    public $DebtOccuredOnForSecondaryTo;


    /**
     * Defaulted date from
     *
     * @var \DateTime
     */
    public $DefaultedDateFrom;


    /**
     * Defaulted date to
     *
     * @var \DateTime
     */
    public $DefaultedDateTo;


    /**
     * Defaulted date from
     *
     * @var \DateTime
     */
    public $RescheduledFrom;


    /**
     * Defaulted date to
     *
     * @var \DateTime
     */
    public $RescheduledTo;


    /**
     * Next payment date to
     *
     * @var \DateTime
     */
    public $NextPaymentDateTo;


    /**
     * Next payment date from
     *
     * @var \DateTime
     */
    public $NextPaymentDateFrom;


    /**
     * Last payment date from
     *
     * @var \DateTime
     */
    public $LastPaymentDateFrom;


    /**
     * Last payment date to
     *
     * @var \DateTime
     */
    public $LastPaymentDateTo;


    /**
     * Two letter iso code for country of origin: EE, ES, FI
     *
     * @var string[]
     */
    public $Countries;


    /**
     * Bondora's rating: AA, A, B, C, D, E, F, HR
     *
     * @var string[]
     */
    public $Ratings;


    /**
     * Minimum credit score
     *
     * @var int
     */
    public $CreditScoreMin;


    /**
     * Maximum credit score
     *
     * @var int
     */
    public $CreditScoreMax;


    /**
     * Borrower's username
     *
     * @var string
     */
    public $UserName;


    /**
     * Loan status code
     *     2 Current
     *     3 Cancelled
     *     100 Overdue
     *     5 60+ days overdue
     *     4 Repaid
     *     8 Released
     *
     * @var int[]
     */
    public $LoanStatusCode;


    /**
     * Income verification type
     *
     * Enum: 1, 2, 3, 4
     *
     * @var int
     */
    public $IncomeVerificationStatus;


    /**
     * Latest debt management stage
     *
     * Enum: 1, 2, 7, 9, 14, 15, 16, 20, 22, 23, 24
     *
     * @var int
     */
    public $LoanDebtManagementStage;


    /**
     * Latest debt management date active from
     *
     * @var \DateTime
     */
    public $LoanDebtManagementDateActiveFrom;


    /**
     * Latest debt management date active to
     *
     * @var \DateTime
     */
    public $LoanDebtManagementDateActiveTo;


    /**
     * Auction bid type
     *
     * Enum: 0, 1, 2
     * @see \Petslane\Bondora\Enum\BidType
     *
     * @var int
     */
    public $AuctionBidType;


    /**
     * Second market sale status
     *     NULL All active
     *     0 Bought investments
     *     1 Sold investments
     *     2 Investment is on sale
     *     3 Investment is not on sale
     *
     * @var int
     */
    public $SalesStatus;


    /**
     * Search only active in repayment loans, StatusCodes (2, 5, 100)
     *
     * @var bool
     */
    public $IsInRepayment;


    /**
     * Max items in result, default is 1000
     *
     * Minimum value: 1
     * Maximum value: 1000
     *
     * @var int
     */
    public $PageSize;


    /**
     * Result page nr
     *
     * Minimum value: 1
     * Maximum value: 2147483647
     *
     * @var int
     */
    public $PageNr;

}


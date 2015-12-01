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
     * Loan issued start date from
     *
     * @var \DateTime
     */
    public $NextPaymentDateFrom;


    /**
     * Loan issued start date to
     *
     * @var \DateTime
     */
    public $NextPaymentDateTo;


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
     * <para>2 Current</para><para>100 Overdue</para><para>5 60+ days overdue</para><para>4 Repaid</para><para>8 Released</para>
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
     * Second market sale status
     * <para>NULL All</para><para>0 Bought investments</para><para>1 Sold investments</para>
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
     * Max returned results, default is 1000
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


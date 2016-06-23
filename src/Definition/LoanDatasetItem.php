<?php

namespace Petslane\Bondora\Definition;

class LoanDatasetItem extends Definition {

    /**
     * Report generation date
     *
     * @var \DateTime
     */
    public $ReportAsOfEOD;


    /**
     * A unique ID given to a loan
     *
     * @var string
     */
    public $LoanId;


    /**
     * A unique loan number displayed in Bondora's system
     *
     * @var string
     */
    public $LoanNumber;


    /**
     * Credit decision taken by Bondora
     *     false Application rejected
     *     true Application approved
     *     null No approval process
     *
     * @var bool
     */
    public $CreditDecision;


    /**
     * Shows if the loan application was funded by investors
     * false Not funded
     * true Funded
     *
     * @var bool
     */
    public $WasFunded;


    /**
     * The amount of investment offers made by Portfolio Managers
     *
     * @var float
     */
    public $BidsInvestmentPlan;


    /**
     * The amount of investment offers made via Api
     *
     * @var float
     */
    public $BidsApi;


    /**
     * The amount of investment offers made manually
     *
     * @var float
     */
    public $BidsManual;


    /**
     * Was the loan applied for by a business entity
     * false No
     * true Yes
     *
     * @var bool
     */
    public $IsBusinessLoan;


    /**
     * Customer's Bondora username
     *
     * @var string
     */
    public $UserName;


    /**
     * Did the customer have prior credit history in Bondora
     *     false Customer had at least 3 months of credit history in Bondora
     *     true No prior credit history in Bondora
     *
     * @var bool
     */
    public $NewCreditCustomer;


    /**
     * Date when the loan application was started
     *
     * @var \DateTime
     */
    public $LoanApplicationStartedDate;


    /**
     * Date when the loan was issued
     *
     * @var \DateTime
     */
    public $LoanDate;


    /**
     * Date when the loan contract ended
     *
     * @var \DateTime
     */
    public $ContractEndDate;


    /**
     * First payment date according to initial loan schedule
     *
     * @var \DateTime
     */
    public $FirstPaymentDate;


    /**
     * Loan maturity date according to the original loan schedule
     *
     * @var \DateTime
     */
    public $MaturityDate_Original;


    /**
     * Loan maturity date as of the report generation date
     *
     * @var \DateTime
     */
    public $MaturityDate_Last;


    /**
     * Has 1 day passed from the date of first scheduled payment
     *
     * @var bool
     */
    public $Has1DPassedFromFirstPayment;


    /**
     * Have 14 days passed from the date of first scheduled payment
     *
     * @var bool
     */
    public $Has14DPassedFromFirstPayment;


    /**
     * Have 30 days passed from the date of first scheduled payment
     *
     * @var bool
     */
    public $Has30DPassedFromFirstPayment;


    /**
     * Have 60 days passed from the date of first scheduled payment
     *
     * @var bool
     */
    public $Has60DPassedFromFirstPayment;


    /**
     * Hour of signing the loan application
     *
     * @var int
     */
    public $ApplicationSignedHour;


    /**
     * Weekday of signing the loan application
     *
     * @var int
     */
    public $ApplicationSignedWeekday;


    /**
     * Method used for loan application data verification
     *
     * Enum: 1, 2, 3, 4
     *
     * @var int
     */
    public $VerificationType;


    /**
     * Customer two letter language code
     *
     * Enum: 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23
     *
     * @var int
     */
    public $LanguageCode;


    /**
     * Age of the borrower (years)
     *
     * @var int
     */
    public $Age;


    /**
     * Borrower gender
     *
     * Enum: 0, 1, 2
     *
     * @var int
     */
    public $Gender;


    /**
     * Residency of the borrower
     *
     * @var string
     */
    public $Country;


    /**
     * County of the borrower
     *
     * @var string
     */
    public $County;


    /**
     * City of the borrower
     *
     * @var string
     */
    public $City;


    /**
     * <list type="bullet">
     * <item>
     * 1000 No previous payments problems</item>
     * <item>
     * 900 Payments problems finished 24-36 months ago</item>
     * <item>
     * 800 Payments problems finished 12-24 months ago</item>
     * <item>
     * 700 Payments problems finished 6-12 months ago</item>
     * <item>
     * 600 Payment problems finished &lt;6 months ago</item>
     * <item>
     * 500 Active payment problems</item>
     * </list>
     *
     * @var int
     */
    public $CreditScore;


    /**
     * Total number of debts (only available in Estonia)
     *
     * @var string
     */
    public $TotalNumDebts;


    /**
     * The longest period when loans were in debt (only available in Estonia)
     *
     * @var string
     */
    public $TotalMaxDebtMonths;


    /**
     * Number of overdue financial agreements (all loans, credit cards, invoices, etc.) (only available in Estonia)
     *
     * @var string
     */
    public $NumDebtsFinance;


    /**
     * The longest period when financial agreements were overdue(all loans, credit cards, invoices, etc.) (only available in Estonia)
     *
     * @var string
     */
    public $MaxDebtMonthsFinance;


    /**
     * Number of overdue telecommunication agreements (only available in Estonia)
     *
     * @var string
     */
    public $NumDebtsTelco;


    /**
     * The longest period when telecommunication agreements were overdue (only available in Estonia)
     *
     * @var string
     */
    public $MaxDebtMonthsTelco;


    /**
     * Number of overdue other agreements (only available in Estonia)
     *
     * @var string
     */
    public $NumDebtsOther;


    /**
     * The longest period when other agreements were overdue (only available in Estonia)
     *
     * @var string
     */
    public $MaxDebtMonthsOther;


    /**
     * Amount applied
     *
     * @var float
     */
    public $AppliedAmount;


    /**
     * Amount the borrower received
     *
     * @var float
     */
    public $FundedAmount;


    /**
     * Maximum interest rate accepted in the loan application
     *
     * @var float
     */
    public $Interest;


    /**
     * Final interest rate
     *
     * @var float
     */
    public $IssuedInterest;


    /**
     * The loan term
     *
     * @var int
     */
    public $LoanDuration;


    /**
     * Use of loan
     *
     * Enum: 0, 1, 2, 3, 4, 5, 6, 7, 8, 101, 102, 103, 104, 105, 106, 107, 108, 109, 110, 201, 202, 203, 204, 205, 206, 207, 208, 209, 210, 211, -1
     *
     * @var int
     */
    public $UseOfLoan;


    /**
     * Application type
     *
     * @var int
     */
    public $ApplicationType;


    /**
     * Education
     *
     * Enum: 1, 2, 3, 4, 5, -1
     *
     * @var int
     */
    public $Education;


    /**
     * Marital status
     *
     * Enum: 1, 2, 3, 4, 5, -1
     *
     * @var int
     */
    public $MaritalStatus;


    /**
     * Number of children or other dependants
     *
     * @var string
     */
    public $NrOfDependants;


    /**
     * Employment status
     *
     * Enum: 1, 2, 3, 4, 5, 6, -1
     *
     * @var int
     */
    public $EmploymentStatus;


    /**
     * Employment time with the current employer
     *
     * @var string
     */
    public $EmploymentDurationCurrentEmployer;


    /**
     * Work experience in total
     *
     * @var string
     */
    public $WorkExperience;


    /**
     * Occupation area
     *
     * Enum: 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, -1
     *
     * @var int
     */
    public $OccupationArea;


    /**
     * Home ownership type
     *
     * Enum: 0, 1, 2, 3, 4, 5, 6, 7, 8, 9, -1
     *
     * @var int
     */
    public $HomeOwnershipType;


    /**
     * Salary
     *
     * @var float
     */
    public $IncomeFromPrincipalEmployer;


    /**
     * Pension
     *
     * @var float
     */
    public $IncomeFromPension;


    /**
     * Family allowance
     *
     * @var float
     */
    public $IncomeFromFamilyAllowance;


    /**
     * Social welfare
     *
     * @var float
     */
    public $IncomeFromSocialWelfare;


    /**
     * Leave pay
     *
     * @var float
     */
    public $IncomeFromLeavePay;


    /**
     * Child support
     *
     * @var float
     */
    public $IncomeFromChildSupport;


    /**
     * Other income
     *
     * @var float
     */
    public $IncomeOther;


    /**
     * Total income
     *
     * @var float
     */
    public $IncomeTotal;


    /**
     * Number of liabilities before the loan
     *
     * @var int
     */
    public $TotalLiabilitiesBeforeLoan;


    /**
     * Number of debt liabilities before the loan
     *
     * @var int
     */
    public $DebtLiabilitiesBeforeLoan;


    /**
     * Number of other liabilities (excl. debt liabilities) before the loan
     *
     * @var int
     */
    public $OtherLiabilitiesBeforeLoan;


    /**
     * Total monthly liabilities
     *
     * @var float
     */
    public $TotalMonthlyLiabilities;


    /**
     * Debt to income ratio
     *
     * @var float
     */
    public $DebtToIncome;


    /**
     * Discretionary income after monthly liabilities
     *
     * @var float
     */
    public $FreeCash;


    /**
     * New loan monthly payment
     *
     * @var float
     */
    public $NewLoanMonthlyPayment;


    /**
     * Applied amount to income, %
     *
     * @var float
     */
    public $AppliedAmountToIncome;


    /**
     * Liabilities to income, %
     *
     * @var float
     */
    public $LiabilitiesToIncome;


    /**
     * New loan monthly payment ratio to income, %
     *
     * @var float
     */
    public $NewPaymentToIncome;


    /**
     * Number of liabilities issued by banks
     *
     * @var int
     */
    public $CountOfBankCredits;


    /**
     * Sum of liabilities issued by banks
     *
     * @var float
     */
    public $SumOfBankCredits;


    /**
     * Count of liabilities issued by payday lenders
     *
     * @var int
     */
    public $CountOfPaydayLoans;


    /**
     * Sum of liabilities issued by payday lenders
     *
     * @var float
     */
    public $SumOfPaydayLoans;


    /**
     * Count of other liabilities
     *
     * @var int
     */
    public $CountOfOtherCredits;


    /**
     * Sum of other liabilities
     *
     * @var float
     */
    public $SumOfOtherCredits;


    /**
     * Number of previous loan applications
     *
     * @var int
     */
    public $NoOfPreviousApplications;


    /**
     * Value of previous loan applications
     *
     * @var float
     */
    public $AmountOfPreviousApplications;


    /**
     * Number of previous loans
     *
     * @var int
     */
    public $NoOfPreviousLoans;


    /**
     * Value of previous loans
     *
     * @var float
     */
    public $AmountOfPreviousLoans;


    /**
     * Number of investments
     *
     * @var int
     */
    public $NoOfInvestments;


    /**
     * Value of investments
     *
     * @var float
     */
    public $AmountOfInvestments;


    /**
     * Number of offers
     *
     * @var int
     */
    public $NoOfBids;


    /**
     * Value of offers
     *
     * @var float
     */
    public $AmountOfBids;


    /**
     * Previous repayments
     *
     * @var float
     */
    public $PreviousRepayments;


    /**
     * Previous late charges paid
     *
     * @var float
     */
    public $PreviousLateFeesPaid;


    /**
     * Previous early repayments
     *
     * @var float
     */
    public $PreviousEarlyRepayments;


    /**
     * Borrower had rescheduled an earlier loan
     *
     * @var bool
     */
    public $HasNewSchedule;


    /**
     * A categorical variable with three values:
     *   - No credit history - The applicant is a new credit customer for Bondora or a customer with less than 3 months of credit history in Bondora
     *   - Good credit history - The applicant is an existing credit customer for Bondora and has not had Bondora loans past due
     *   - Bad credit history - The applicant is an existing credit customer for Bondora and has had Bondora loans at least 14 days overdue
     *
     * @var string
     */
    public $BondoraCreditHistory;


    /**
     * Underwriters restructured the initial application and either offered longer term, higher/lower loan amount or higher interest rate
     *
     * @var bool
     */
    public $NewOfferMade;


    /**
     * The day of the month the loan payments are scheduled for
     * The actual date is adjusted for weekends and bank holidays(e.g. if 10th is Sunday then the payment will be made on the 11th in that month)
     *
     * @var int
     */
    public $MonthlyPaymentDay;


    /**
     * The date of the current last payment received from the borrower
     *
     * @var \DateTime
     */
    public $LastPaymentOn;


    /**
     * The amount of principal still outstanding at the time of the dataset update
     *
     * @var float
     */
    public $OutstandingPrincipal;


    /**
     * The amount of overdue interest and late charges, including interest accrued on the overdue principal amount during the overdue period
     *
     * @var float
     */
    public $UnpaidInterestOutstanding;


    /**
     * Interest and late charges paid on the loan
     *
     * @var float
     */
    public $InterestAndPenaltiesPaid;


    /**
     * Loans cancelled within 14 days
     *
     * @var bool
     */
    public $CancelledWithin14Days;


    /**
     * Date of the beginning of Grace period
     *
     * @var \DateTime
     */
    public $GracePeriodStart;


    /**
     * Date of the end of Grace period
     *
     * @var \DateTime
     */
    public $GracePeriodEnd;


    /**
     * Borrower has rescheduled current loan
     *
     * @var bool
     */
    public $CurrentLoanHasBeenExtended;


    /**
     * This loan has at one moment been overdue for 1 day
     *
     * @var bool
     */
    public $InDebt1Day;


    /**
     * This loan has at one moment been overdue for 14 day
     *
     * @var bool
     */
    public $InDebt14Day;


    /**
     * This loan has at one moment been overdue for 30 day
     *
     * @var bool
     */
    public $InDebt30Day;


    /**
     * This loan has at one moment been overdue for 60 day
     *
     * @var bool
     */
    public $InDebt60Day;


    /**
     * The loan reached 14 days overdue without making a full month's payment
     *
     * @var bool
     */
    public $IsFirstPaymentDefault;


    /**
     * Did the borrower leave money on their account for the first payment
     *
     * @var bool
     */
    public $LeftMoneyForFirstPayment;


    /**
     * Number of debt days of the loan at the time of the dataset update
     *
     * @var int
     */
    public $CurrentDebtDays;


    /**
     * The amount of principal overdue
     *
     * @var float
     */
    public $PrincipalDebtAmount;


    /**
     * First date when a contract became 1 day past due
     *
     * @var \DateTime
     */
    public $InDebt1Day_StartDate;


    /**
     * Outstanding loan principal at the InDebt1Day_StartDate
     *
     * @var float
     */
    public $InDebt1Day_Principal;


    /**
     * The proportion of outstanding loan principal at the InDebt1Day_StartDate that's overdue out of the funded amount
     *
     * @var float
     */
    public $InDebt1Day_PrincipalProportion;


    /**
     * Accrued but unpaid interest by the InDebt1Day_StartDate
     *
     * @var float
     */
    public $InDebt1Day_Interest;


    /**
     * Total debt amount at the InDebt1Day_StartDate
     *
     * @var float
     */
    public $InDebt1Day_Exposure;


    /**
     * Total repayments made (principal + interest + late charge) by the InDebt1Day_StartDate
     *
     * @var float
     */
    public $InDebt1Day_TotalRepayments;


    /**
     * First date when a contract became 7 days past due
     *
     * @var \DateTime
     */
    public $InDebt7Day_StartDate;


    /**
     * Outstanding loan principal at the InDebt7Day_StartDate
     *
     * @var float
     */
    public $InDebt7Day_Principal;


    /**
     * The proportion of outstanding loan principal at the InDebt7Day_StartDate that's overdue out of the funded amount
     *
     * @var float
     */
    public $InDebt7Day_PrincipalProportion;


    /**
     * Accrued but unpaid interest by the InDebt7Day_StartDate
     *
     * @var float
     */
    public $InDebt7Day_Interest;


    /**
     * Total debt amount at the InDebt7Day_StartDate
     *
     * @var float
     */
    public $InDebt7Day_Exposure;


    /**
     * Total repayments made (principal + interest + late charge) by the InDebt7Day_StartDate
     *
     * @var float
     */
    public $InDebt7Day_TotalRepayments;


    /**
     * First date when a contract became 14 days past due
     *
     * @var \DateTime
     */
    public $InDebt14Day_StartDate;


    /**
     * Outstanding loan principal at the InDebt14Day_StartDate
     *
     * @var float
     */
    public $InDebt14Day_Principal;


    /**
     * The proportion of outstanding loan principal at the InDebt14Day_StartDate that's overdue out of the funded amount
     *
     * @var float
     */
    public $InDebt14Day_PrincipalProportion;


    /**
     * Accrued but unpaid interest by the InDebt14Day_StartDate
     *
     * @var float
     */
    public $InDebt14Day_Interest;


    /**
     * Total debt amount at the InDebt14Day_StartDate
     *
     * @var float
     */
    public $InDebt14Day_Exposure;


    /**
     * Total repayments made (principal + interest + late charge) by the InDebt14Day_StartDate
     *
     * @var float
     */
    public $InDebt14Day_TotalRepayments;


    /**
     * First date when a contract became 21 days past due
     *
     * @var \DateTime
     */
    public $InDebt21Day_StartDate;


    /**
     * Outstanding loan principal at the InDebt21Day_StartDate
     *
     * @var float
     */
    public $InDebt21Day_Principal;


    /**
     * The proportion of outstanding loan principal at the InDebt21Day_StartDate that's overdue out of the funded amount
     *
     * @var float
     */
    public $InDebt21Day_PrincipalProportion;


    /**
     * Accrued but unpaid interest by the InDebt21Day_StartDate
     *
     * @var float
     */
    public $InDebt21Day_Interest;


    /**
     * Total debt amount at the InDebt21Day_StartDate
     *
     * @var float
     */
    public $InDebt21Day_Exposure;


    /**
     * Total repayments made (principal + interest + late charge) by the InDebt21Day_StartDate
     *
     * @var float
     */
    public $InDebt21Day_TotalRepayments;


    /**
     * First date when a contract became 30 days past due
     *
     * @var \DateTime
     */
    public $InDebt30Day_StartDate;


    /**
     * Outstanding loan principal at the InDebt30Day_StartDate
     *
     * @var float
     */
    public $InDebt30Day_Principal;


    /**
     * The proportion of outstanding loan principal at the InDebt30Day_StartDate that's overdue out of the funded amount
     *
     * @var float
     */
    public $InDebt30Day_PrincipalProportion;


    /**
     * Accrued but unpaid interest by the InDebt30Day_StartDate
     *
     * @var float
     */
    public $InDebt30Day_Interest;


    /**
     * Total debt amount at the InDebt30Day_StartDate
     *
     * @var float
     */
    public $InDebt30Day_Exposure;


    /**
     * Total repayments made (principal + interest + late charge) by the InDebt30Day_StartDate
     *
     * @var float
     */
    public $InDebt30Day_TotalRepayments;


    /**
     * First date when a contract became 60 days past due
     *
     * @var \DateTime
     */
    public $InDebt60Day_StartDate;


    /**
     * Outstanding loan principal at the InDebt60Day_StartDate
     *
     * @var float
     */
    public $InDebt60Day_Principal;


    /**
     * The proportion of outstanding loan principal at the InDebt60Day_StartDate that's overdue out of the funded amount
     *
     * @var float
     */
    public $InDebt60Day_PrincipalProportion;


    /**
     * Accrued but unpaid interest by the InDebt60Day_StartDate
     *
     * @var float
     */
    public $InDebt60Day_Interest;


    /**
     * Total debt amount at the InDebt60Day_StartDate
     *
     * @var float
     */
    public $InDebt60Day_Exposure;


    /**
     * Total repayments made (principal + interest + late charge) by the InDebt60Day_StartDate
     *
     * @var float
     */
    public $InDebt60Day_TotalRepayments;


    /**
     * The date when a new schedule was made for an overdue loan
     *
     * @var \DateTime
     */
    public $DebtRestructuringDate;


    /**
     * Outstanding principal at the moment of restructuring
     *
     * @var float
     */
    public $Principal_at_DebtRestructuring;


    /**
     * Proportion of outstanding principal out of initial amount at the moment of restructuring
     *
     * @var float
     */
    public $PrincipalProportion_at_DebtRestructuring;


    /**
     * Overdue and accrued interest amount at the moment of DebtRestructuring
     *
     * @var float
     */
    public $Interest_at_DebtRestructuring;


    /**
     * Outstanding principal and overdue and accrued interests and late charges on DebtRestructuringDate
     *
     * @var float
     */
    public $Exposure_at_DebtRestructuring;


    /**
     * All payments made before debt restructuring
     *
     * @var float
     */
    public $TotalRepayments_at_DebtRestructuring;


    /**
     * The date when the loan defaulted
     *
     * @var \DateTime
     */
    public $Default_StartDate;


    /**
     * Outstanding loan principal at the Default_StartDate
     *
     * @var float
     */
    public $Principal_at_Default;


    /**
     * The proportion of outstanding loan principal at the Default_StartDate that's overdue out of the funded amount
     *
     * @var float
     */
    public $PrincipalProportion_at_Default;


    /**
     * Accrued but unpaid interest by the Default_StartDate
     *
     * @var float
     */
    public $InterestDebt_at_Default;


    /**
     * Total debt amount at the Default_StartDate
     *
     * @var float
     */
    public $Exposure_at_Default;


    /**
     * Total repayments made (principal + interest + late charge) by the Default_StartDate
     *
     * @var float
     */
    public $TotalRepayments_at_Default;


    /**
     * The number of days it took for the loan to go default
     *
     * @var int
     */
    public $DefaultedOnDay;


    /**
     * Actual default; A loan is been considered to be in default after missing 3 consequtive payments
     *
     * @var int
     */
    public $AD;


    /**
     * Exposure at default, outstanding principal at default
     *
     * @var float
     */
    public $EAD1;


    /**
     * Exposure at default, loan amount less all payments prior to default
     *
     * @var float
     */
    public $EAD2;


    /**
     * Recovery after default including interest and late charge payments
     *
     * @var float
     */
    public $Recovery;


    /**
     * Date when the Rating was calculated for this loan
     *
     * @var \DateTime
     */
    public $ScoringDate;


    /**
     * The version of the Rating model used for issuing the Bondora Rating
     *
     * @var int
     */
    public $ModelVersion;


    /**
     * Expected Loss calculated by the Rating model
     *
     * @var float
     */
    public $EL;


    /**
     * Bondora Rating issued by the Rating model
     *
     * @var string
     */
    public $Rating;


    /**
     * Is this the inactive loan in the loan cycle that was not issued?
     *
     * @var bool
     */
    public $IsInactiveDuplicate;


    /**
     * The loan ID for the application that was cancelled prior to this application or was created after this one was cancelled during data verification process.
     *
     * @var string
     */
    public $AssociatedDuplicateLoanId;


    /**
     * Was the loan cancelled or repaid by the borrower within 1 month after issuing
     *
     * @var bool
     */
    public $CancelledWithin1Month;


    /**
     * Was the loan repaid early by the borrower within 14 days after issuing
     *
     * @var bool
     */
    public $EarlyRepaidWithin14Days;


    /**
     * Was the loan released after our analyses
     *
     * @var bool
     */
    public $PostFundingCancellation;


    /**
     * Was the loan cancelled because borrower did not pass the required ID checks
     *
     * @var bool
     */
    public $IdCancellation;

}


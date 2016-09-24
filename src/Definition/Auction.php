<?php

namespace Petslane\Bondora\Definition;

/**
 * Auction related data
 */
class Auction extends Definition {

    /**
     * Unique loan identificator
     *
     * @var string
     */
    public $LoanId;


    /**
     * Unique auction identificator
     *
     * @var string
     */
    public $AuctionId;


    /**
     * Number of the loan
     *
     * @var int
     */
    public $LoanNumber;


    /**
     * Customer's Bondora username
     *
     * @var string
     */
    public $UserName;


    /**
     * Did the customer have prior credit history in Bondora
     *     0 Customer had at least 3 months of credit history in Bondora
     *     1 No prior credit history in Bondora
     *
     * @var int
     */
    public $NewCreditCustomer;


    /**
     * Date when the loan application was started
     *
     * @var \DateTime
     */
    public $LoanApplicationStartedDate;


    /**
     * Date and time when the auction is closed, if it's not funded 100% before that.
     * Auction will be closed before that, if auction is funded 100%.
     *
     * @var \DateTime
     */
    public $PlannedCloseDate;


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
     * Verification type
     *
     * Enum: 1, 2, 3, 4
     * @see Petslane\Bondora\Enum\IncomeVerificationStatus
     *
     * @var int
     */
    public $VerificationType;


    /**
     * Two letter language code
     *
     * Enum: 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23
     * @see Petslane\Bondora\Enum\LanguageCode
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
     * Borrower's date of birth
     *
     * @var \DateTime
     */
    public $DateOfBirth;


    /**
     * Gender
     *
     * Enum: 0, 1, 2
     * @see Petslane\Bondora\Enum\Sex
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
     * A score that is specifically designed for risk classifying subprime borrowers (defined by Equifax as borrowers that do not have access to bank loans).
     * A measure of the probability of default one month ahead.
     *     The score is given on a 10-grade scale, from the best score to the worst:
     *     M1, M2, M3, M4, M5, M6, M7, M8, M9, M10
     *
     * @var string
     */
    public $CreditScoreEsMicroL;


    /**
     * Generic score for the loan applicants that do not have active past due operations in ASNEF.
     * A measure of the probability of default one year ahead.
     * The score is given on a 6-grade scale.
     *     AAA Very low
     *     AA Low
     *     A Average
     *     B Average High
     *     C High
     *     D Very High
     *
     * @var string
     */
    public $CreditScoreEsEquifaxRisk;


    /**
     * Credit Scoring model for Finnish Asiakastieto
     *     RL1 Very low risk 01-20
     *     RL2 Low risk 21-40
     *     RL3 Average risk 41-60
     *     RL4 Big risk 61-80
     *     RL5 Huge risk 81-100
     *
     * @var string
     */
    public $CreditScoreFiAsiakasTietoRiskGrade;


    /**
     * Credit scoring for Estonian loans
     *     1000 No previous payments problems
     *     900 Payments problems finished 24-36 months ago
     *     800 Payments problems finished 12-24 months ago
     *     700 Payments problems finished 6-12 months ago
     *     600 Payment problems finished &lt;6 months ago
     *     500 Active payment problems
     *
     * @var string
     */
    public $CreditScoreEeMini;


    /**
     * The amount borrower applied for originally
     *
     * @var float
     */
    public $AppliedAmount;


    /**
     * Maximum interest rate accepted in the loan application
     *
     * @var float
     */
    public $Interest;


    /**
     * The loan term
     *
     * @var int
     */
    public $LoanDuration;


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
     * Use of loan
     *
     * Enum: 0, 1, 2, 3, 4, 5, 6, 7, 8, 101, 102, 103, 104, 105, 106, 107, 108, 109, 110, 201, 202, 203, 204, 205, 206, 207, 208, 209, 210, 211, -1
     * @see Petslane\Bondora\Enum\AuctionPurpose
     *
     * @var int
     */
    public $UseOfLoan;


    /**
     * Education
     *
     * Enum: 1, 2, 3, 4, 5, -1
     * @see Petslane\Bondora\Enum\Education
     *
     * @var int
     */
    public $Education;


    /**
     * Marital status
     *
     * Enum: 1, 2, 3, 4, 5, -1
     * @see Petslane\Bondora\Enum\MaritalStatus
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
     * @see Petslane\Bondora\Enum\EmploymentStatus
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
     * Employment position
     *
     * @var string
     */
    public $EmploymentPosition;


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
     * @see Petslane\Bondora\Enum\OccupationArea
     *
     * @var int
     */
    public $OccupationArea;


    /**
     * Type of home ownership
     *
     * Enum: 0, 1, 2, 3, 4, 5, 6, 7, 8, 9, -1
     * @see Petslane\Bondora\Enum\HomeOwnershipType
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
     * Discretionary Income
     *
     * @var float
     */
    public $FreeCash;


    /**
     * Debt to income ratio
     *
     * @var float
     */
    public $DebtToIncome;


    /**
     * Loan monthly payment amount.
     *
     * @var float
     */
    public $MonthlyPayment;


    /**
     * The day of the month the loan payments are scheduled for.
     * The actual date is adjusted for weekends and bank holidays.
     * E.g. if 10th is a Sunday then the payment will be made on the 11th in that month.
     *
     * @var int
     */
    public $MonthlyPaymentDay;


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
    public $ExpectedLoss;


    /**
     * Bondora Rating issued by the Rating model
     *
     * @var string
     */
    public $Rating;


    /**
     * Gives the percentage of outstanding exposure at the time of default that an investor is likely to lose if a loan actually defaults.
     * This means the proportion of funds lost for the investor after all expected recovery and accounting for the time value of the money recovered.
     * In general, LGD parameter is intended to be estimated based on the historical recoveries. However, in new markets where limited experience does not allow us more precise loss given default estimates, a LGD of 90% is assumed.
     *
     * @var float
     */
    public $LossGivenDefault;


    /**
     * Probability of Default, refers to a loan’s probability of default within one year horizon.
     *
     * @var float
     */
    public $ProbabilityOfDefault;


    /**
     * Expected return alpha
     *
     * @var float
     */
    public $ExpectedReturnAlpha;


    /**
     * Total liabilities
     *
     * @var float
     */
    public $LiabilitiesTotal;


    /**
     * Date when auction was published
     *
     * @var \DateTime
     */
    public $ListedOnUTC;


    /**
     * Date and time when the auction was actually closed. Is null, if auction is active.
     *
     * @var \DateTime
     */
    public $ActualCloseDate;


    /**
     * The amount that auction is fulfilled, taken amount only bids where investors have enough funds.
     * This is preliminary calculated amount and can change when trying to close auction (auction is closed, when auction is funded 100% or PlannedCloseDate is reached) and specific investor(s) do not have enough funds.
     *
     * @var float
     */
    public $WinningBidsAmount;


    /**
     * The amount that is remaining to be funded (AppliedAmount - WinningBidsAmount).
     *
     * @var float
     */
    public $RemainingAmount;


    /**
     * How many bids current user has bidden into the auction
     *
     * @var int
     */
    public $UserBids;


    /**
     * How much current user has bidden into the auction
     *
     * @var float
     */
    public $UserBidAmount;


    /**
     * Precentage, how much the auction is fulfilled. Can be more than 100%, if overfunded.
     *
     * @var float
     */
    public $Fullfilled;


    /**
     *     1000 No previous payments problems
     *     900 Payments problems finished 24-36 months ago
     *     800 Payments problems finished 12-24 months ago
     *     700 Payments problems finished 6-12 months ago
     *     600 Payment problems finished &lt;6 months ago
     *     500 Active payment problems
     *
     * @deprecated
     * @var int
     */
    public $CreditScore;


    /**
     * Date when the Rating was calculated for this loan
     *
     * @deprecated
     * @var \DateTime
     */
    public $ScoringDate;


    /**
     * Exposure at Default (expressed as a percentage of the original loan amount), indicates outstanding investor exposure at the time of default, including outstanding principal amount plus accrued but unpaid interests.
     *
     * @deprecated
     * @var float
     */
    public $EADRate;


    /**
     * Maturity Factor M of 1.3 is assumed for loans with duration exceeding one year.
     *
     * @deprecated
     * @var float
     */
    public $MaturityFactor;


    /**
     * Interest rate alpha
     *
     * @deprecated
     * @var float
     */
    public $InterestRateAlpha;

}


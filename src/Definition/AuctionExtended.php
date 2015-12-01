<?php

namespace Petslane\Bondora\Definition;

/**
 * Auction related data with debts and liabilities
 */
class AuctionExtended extends Definition {

    /**
     * Borrower's liabilities
     *
     * @var Liability[]
     */
    public $Liabilities;


    /**
     * Borrower's debts
     *
     * @var Debt[]
     */
    public $Debts;


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
     * <para>0 Customer had at least 3 months of credit history in Bondora</para><para>1 No prior credit history in Bondora</para>
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
     *
     * @var int
     */
    public $VerificationType;


    /**
     * Two letter language code
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
     * Gender
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
     * <para>
     * 1000 No previous payments problems</para>
     * <para>
     * 900 Payments problems finished 24-36 months ago</para>
     * <para>
     * 800 Payments problems finished 12-24 months ago</para>
     * <para>
     * 700 Payments problems finished 6-12 months ago</para>
     * <para>
     * 600 Payment problems finished &lt;6 months ago</para>
     * <para>
     * 500 Active payment problems</para>
     *
     * @var int
     */
    public $CreditScore;


    /**
     * Amount applied
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
     *
     * @var int
     */
    public $UseOfLoan;


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
     * Type of home ownership
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
     * The day of the month the loan payments are scheduled for.
     * The actual date is adjusted for weekends and bank holidays.
     * E.g. if 10th is a Sunday then the payment will be made on the 11th in that month.
     *
     * @var int
     */
    public $MonthlyPaymentDay;


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
    public $ExpectedLoss;


    /**
     * Bondora Rating issued by the Rating model
     *
     * @var string
     */
    public $Rating;


    /**
     * Exposure at Default (expressed as a percentage of the original loan amount), indicates outstanding investor exposure at the time of default, including outstanding principal amount plus accrued but unpaid interests.
     *
     * @var float
     */
    public $EADRate;


    /**
     * Gives the percentage of outstanding exposure at the time of default that an investor is likely to lose if a loan actually defaults.
     * This means the proportion of funds lost for the investor after all expected recovery and accounting for the time value of the money recovered.
     * In general, LGD parameter is intended to be estimated based on the historical recoveries. However, in new markets where limited experience does not allow us more precise loss given default estimates, a LGD of 90% is assumed.
     *
     * @var float
     */
    public $LossGivenDefault;


    /**
     * Maturity Factor M of 1.3 is assumed for loans with duration exceeding one year.
     *
     * @var float
     */
    public $MaturityFactor;


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
     * Interest rate alpha
     *
     * @var float
     */
    public $InterestRateAlpha;


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

}


<?php

namespace Petslane\Bondora\Definition;

/**
 * Auction related data
 */
class Auction extends Definition {

    /**
     * @var string
     */
    public $LoanId;


    /**
     * @var string
     */
    public $AuctionId;


    /**
     * @var int
     */
    public $LoanNumber;


    /**
     * @var string
     */
    public $UserName;


    /**
     * @var int
     */
    public $NewCreditCustomer;


    /**
     * @var \DateTime
     */
    public $LoanApplicationStartedDate;


    /**
     * @var int
     */
    public $ApplicationSignedHour;


    /**
     * @var int
     */
    public $ApplicationSignedWeekday;


    /**
     * @var int
     */
    public $VerificationType;


    /**
     * @var int
     */
    public $LanguageCode;


    /**
     * @var int
     */
    public $Age;


    /**
     * @var int
     */
    public $Gender;


    /**
     * @var string
     */
    public $Country;


    /**
     * @var int
     */
    public $CreditScore;


    /**
     * @var string
     */
    public $CreditGroup;


    /**
     * @var float
     */
    public $AppliedAmount;


    /**
     * @var float
     */
    public $Interest;


    /**
     * @var int
     */
    public $LoanDuration;


    /**
     * @var string
     */
    public $County;


    /**
     * @var string
     */
    public $City;


    /**
     * @var int
     */
    public $UseOfLoan;


    /**
     * @var int
     */
    public $Education;


    /**
     * @var int
     */
    public $MaritalStatus;


    /**
     * @var int
     */
    public $NrOfDependants;


    /**
     * @var int
     */
    public $EmploymentStatus;


    /**
     * @var string
     */
    public $EmploymentDurationCurrentEmployer;


    /**
     * @var string
     */
    public $WorkExperience;


    /**
     * @var int
     */
    public $OccupationArea;


    /**
     * @var int
     */
    public $HomeOwnershipType;


    /**
     * @var float
     */
    public $IncomeFromPrincipalEmployer;


    /**
     * @var float
     */
    public $IncomeFromPension;


    /**
     * @var float
     */
    public $IncomeFromFamilyAllowance;


    /**
     * @var float
     */
    public $IncomeFromSocialWelfare;


    /**
     * @var float
     */
    public $IncomeFromLeavePay;


    /**
     * @var float
     */
    public $IncomeFromChildSupport;


    /**
     * @var float
     */
    public $IncomeOther;


    /**
     * @var float
     */
    public $IncomeTotal;


    /**
     * @var int
     */
    public $MonthlyPaymentDay;


    /**
     * @var \DateTime
     */
    public $ScoringDate;


    /**
     * @var int
     */
    public $ModelVersion;


    /**
     * @var float
     */
    public $ExpectedLoss;


    /**
     * @var string
     */
    public $Rating;


    /**
     * @var float
     */
    public $CureRate;


    /**
     * @var float
     */
    public $EADRate;


    /**
     * @var float
     */
    public $LossGivenDefault;


    /**
     * @var float
     */
    public $MaturityFactor;


    /**
     * @var float
     */
    public $ProbabilityOfBad;


    /**
     * @var float
     */
    public $ProbabilityOfDefault;


    /**
     * @var float
     */
    public $ExpectedReturnAlpha;


    /**
     * @var float
     */
    public $InterestRateAlpha;

}


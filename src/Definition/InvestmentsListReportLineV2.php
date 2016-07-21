<?php

namespace Petslane\Bondora\Definition;

class InvestmentsListReportLineV2 extends Definition {

    /**
     * @var string
     */
    public $LoanId;

    /**
     * @var string
     */
    public $LoanPartId;

    /**
     * @var string
     */
    public $AuctionId;

    /**
     * @var float
     */
    public $AppliedAmount;

    /**
     * @var \DateTime
     */
    public $BiddingStartedOn;

    /**
     * @var \DateTime
     */
    public $ListedOnUTC;

    /**
     * @var float
     */
    public $BidPrincipal;

    /**
     * @var \DateTime
     */
    public $BoughtFromResale_Date;

    /**
     * @var float
     */
    public $PurchasePrice;

    /**
     * @var \DateTime
     */
    public $SoldInResale_Date;

    /**
     * @var float
     */
    public $SoldInResale_Price;

    /**
     * @var float
     */
    public $SoldInResale_Principal;

    /**
     * @var \DateTime
     */
    public $OnSaleSince;

    /**
     * @var int
     */
    public $LoanNumber;

    /**
     * @var string
     */
    public $UserName;

    /**
     * @var bool
     */
    public $NewCreditCustomer;

    /**
     * @var \DateTime
     */
    public $LoanApplicationStartedDate;

    /**
     * @var \DateTime
     */
    public $ContractEndDate;

    /**
     * @var \DateTime
     */
    public $FirstPaymentDate;

    /**
     * @var \DateTime
     */
    public $MaturityDate_Original;

    /**
     * @var \DateTime
     */
    public $MaturityDate_Last;

    /**
     * @var int
     */
    public $ApplicationSignedHour;

    /**
     * @var int
     */
    public $ApplicationSignedWeekday;

    /**
     * @var float
     */
    public $Interest;

    /**
     * @var int
     */
    public $LoanDuration;

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
     * @var \DateTime
     */
    public $DateOfBirth;

    /**
     * @var int
     */
    public $Gender;

    /**
     * @var string
     */
    public $Country;

    /**
     * @var string
     */
    public $County;

    /**
     * @var string
     */
    public $City;

    /**
     * @var string
     */
    public $CreditScoreEsMicroL;

    /**
     * @var string
     */
    public $CreditScoreEsEquifaxRisk;

    /**
     * @var string
     */
    public $CreditScoreFiAsiakasTietoRiskGrade;

    /**
     * @var string
     */
    public $CreditScoreEeMini;

    /**
     * @var int
     */
    public $UseOfLoan;

    /**
     * @var int
     */
    public $Education;

    /**
     * @var string
     */
    public $EmploymentDurationCurrentEmployer;

    /**
     * @var string
     */
    public $EmploymentPosition;

    /**
     * @var int
     */
    public $EmploymentStatus;

    /**
     * @var int
     */
    public $MaritalStatus;

    /**
     * @var int
     */
    public $NrOfDependants;

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
    public $ExistingLiabilities;

    /**
     * @var int
     */
    public $RefinanceLiabilities;

    /**
     * @var float
     */
    public $LiabilitiesTotal;

    /**
     * @var float
     */
    public $DebtToIncome;

    /**
     * @var float
     */
    public $MonthlyPayment;

    /**
     * @var int
     */
    public $MonthlyPaymentDay;

    /**
     * @var float
     */
    public $FreeCash;

    /**
     * @var int
     */
    public $CurrentDebtDaysPrimary;

    /**
     * @var int
     */
    public $CurrentDebtDaysSecondary;

    /**
     * @var \DateTime
     */
    public $DebtOccuredOn;

    /**
     * @var \DateTime
     */
    public $DebtOccuredOnForSecondary;

    /**
     * @var \DateTime
     */
    public $DefaultDate;

    /**
     * @var string
     */
    public $Status;

    /**
     * @var string
     */
    public $ActiveLateCategory;

    /**
     * @var string
     */
    public $WorseLateCategory;

    /**
     * @var bool
     */
    public $ActiveScheduleFirstPaymentReached;

    /**
     * @var bool
     */
    public $LoanCancelled;

    /**
     * @var float
     */
    public $Restructured;

    /**
     * @var float
     */
    public $PrincipalRecovery;

    /**
     * @var float
     */
    public $InterestRecovery;

    /**
     * @var float
     */
    public $PlannedPrincipalPostDefault;

    /**
     * @var float
     */
    public $PlannedInterestPostDefault;

    /**
     * @var float
     */
    public $PlannedPrincipalTillDate;

    /**
     * @var float
     */
    public $PlannedInterestTillDate;

    /**
     * @var int
     */
    public $RecoveryStage;

    /**
     * @var \DateTime
     */
    public $StageActiveSince;

    /**
     * @var int
     */
    public $ModelVersion;

    /**
     * @var float
     */
    public $ExpectedLoss;

    /**
     * @var float
     */
    public $ExpectedReturn;

    /**
     * @var float
     */
    public $LossGivenDefault;

    /**
     * @var float
     */
    public $ProbabilityOfDefault;

    /**
     * @var string
     */
    public $Rating;

    /**
     * @var float
     */
    public $EL_V0;

    /**
     * @var float
     */
    public $EL_V1;

    /**
     * @var float
     */
    public $EL_V2;

    /**
     * @var string
     */
    public $Rating_V0;

    /**
     * @var string
     */
    public $Rating_V1;

    /**
     * @var string
     */
    public $Rating_V2;

    /**
     * @var float
     */
    public $PrincipalOverdueBySchedule;
}

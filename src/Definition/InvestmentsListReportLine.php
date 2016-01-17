<?php

namespace Petslane\Bondora\Definition;

class InvestmentsListReportLine extends Definition {

    /** @var string */
    public $LoanId;

    /** @var string */
    public $LoanPartId;

    /** @var float */
    public $BidPrincipal;

    /** @var float */
    public $InvestmentPrincipal;

    /** @var int */
    public $BoughtFromResale;

    /** @var \DateTime */
    public $BoughtFromResale_Date;

    /** @var float */
    public $PurchasePrice;

    /** @var int */
    public $SoldInResale;

    /** @var \DateTime */
    public $SoldInResale_Date;

    /** @var float */
    public $SoldInResale_Price;

    /** @var float */
    public $SoldInResale_Principal;

    /** @var float */
    public $OutstandingPrincipal;

    /** @var float */
    public $UnpaidInterestOutstanding;

    /** @var float */
    public $InterestAndPenaltiesPaid;

    /** @var int */
    public $LoanNumber;

    /** @var int */
    public $InvestmentNumber;

    /** @var string */
    public $InvestmentPlanID;

    /** @var string */
    public $UserName;

    /** @var int */
    public $NewCreditCustomer;

    /** @var \DateTime */
    public $LoanApplicationStartedDate;

    /** @var \DateTime */
    public $LoanDate;

    /** @var \DateTime */
    public $ContractEndDate;

    /** @var \DateTime */
    public $FirstPaymentDate;

    /** @var \DateTime */
    public $MaturityDate_Original;

    /** @var \DateTime */
    public $MaturityDate_Last;

    /** @var int */
    public $Is1DFromFirstPayment;

    /** @var int */
    public $Is14DFromFirstPayment;

    /** @var int */
    public $Is30DFromFirstPayment;

    /** @var int */
    public $Is60DFromFirstPayment;

    /** @var int */
    public $ApplicationSignedHour;

    /** @var int */
    public $ApplicationSignedWeekday;

    /** @var int */
    public $VerificationType;

    /** @var int */
    public $language_code;

    /** @var int */
    public $Age;

    /** @var int */
    public $Gender;

    /** @var string */
    public $Country;

    /** @var int */
    public $credit_score;

    /** @var string */
    public $CreditGroup;

    /** @var string */
    public $TotalNumDebts;

    /** @var string */
    public $TotalMaxDebtMonths;

    /** @var string */
    public $NumDebtsFinance;

    /** @var string */
    public $MaxDebtMonthsFinance;

    /** @var string */
    public $NumDebtsTelco;

    /** @var string */
    public $MaxDebtMonthsTelco;

    /** @var string */
    public $NumDebtsOther;

    /** @var string */
    public $MaxDebtMonthsOther;

    /** @var float */
    public $IssuedInterest;

    /** @var float */
    public $CurrentInterest;

    /** @var int */
    public $LoanDuration;

    /** @var string */
    public $County;

    /** @var string */
    public $City;

    /** @var int */
    public $UseOfLoan;

    /** @var int */
    public $ApplicationType;

    /** @var int */
    public $education_id;

    /** @var int */
    public $marital_status_id;

    /** @var string */
    public $nr_of_dependants;

    /** @var int */
    public $employment_status_id;

    /** @var string */
    public $Employment_Duration_Current_Employer;

    /** @var string */
    public $work_experience;

    /** @var int */
    public $occupation_area;

    /** @var int */
    public $home_ownership_type_id;

    /** @var float */
    public $income_from_principal_employer;

    /** @var float */
    public $IncomeFromPension;

    /** @var float */
    public $IncomeFromFamilyAllowance;

    /** @var float */
    public $IncomeFromSocialWelfare;

    /** @var float */
    public $IncomeFromLeavePay;

    /** @var float */
    public $IncomeFromChildSupport;

    /** @var float */
    public $income_other;

    /** @var float */
    public $income_total;

    /** @var int */
    public $TotalLiabilitiesBeforeLoan;

    /** @var int */
    public $DebtLiabilitiesBeforeLoan;

    /** @var int */
    public $OtherLiabilitiesBeforeLoan;

    /** @var float */
    public $TotalMonthlyLiabilities;

    /** @var float */
    public $DebtToIncome;

    /** @var float */
    public $NewLoanMonthlyPayment;

    /** @var float */
    public $AppliedAmountToIncome;

    /** @var float */
    public $FreeCash;

    /** @var float */
    public $LiabilitiesToIncome;

    /** @var float */
    public $NewPaymentToIncome;

    /** @var int */
    public $NoOfPreviousApplications;

    /** @var float */
    public $AmountOfPreviousApplications;

    /** @var int */
    public $NoOfPreviousLoans;

    /** @var float */
    public $AmountOfPreviousLoans;

    /** @var int */
    public $NoOfInvestments;

    /** @var float */
    public $AmountOfInvestments;

    /** @var int */
    public $NoOfBids;

    /** @var float */
    public $AmountOfBids;

    /** @var float */
    public $PreviousRepayments;

    /** @var float */
    public $PreviousLateFeesPaid;

    /** @var int */
    public $PreviousEarlyRepayments;

    /** @var int */
    public $HasExtendedSchedule;

    /** @var string */
    public $BondoraCreditHistory;

    /** @var int */
    public $NewOfferMade;

    /** @var int */
    public $MonthlyPaymentDay;

    /** @var \DateTime */
    public $LastPaymentOn;

    /** @var int */
    public $InDebt1Day;

    /** @var int */
    public $InDebt14Day;

    /** @var int */
    public $InDebt30Day;

    /** @var int */
    public $InDebt60Day;

    /** @var int */
    public $LeftMoneyForFirstPayment;

    /** @var int */
    public $CurrentDebtDays;

    /** @var \DateTime */
    public $InDebt1Day_StartDate;

    /** @var float */
    public $InDebt1Day_PrincipalProportion;

    /** @var \DateTime */
    public $InDebt7Day_StartDate;

    /** @var float */
    public $InDebt7Day_PrincipalProportion;

    /** @var \DateTime */
    public $InDebt14Day_StartDate;

    /** @var float */
    public $InDebt14Day_PrincipalProportion;

    /** @var \DateTime */
    public $InDebt21Day_StartDate;

    /** @var float */
    public $InDebt21Day_PrincipalProportion;

    /** @var \DateTime */
    public $InDebt30Day_StartDate;

    /** @var float */
    public $InDebt30Day_PrincipalProportion;

    /** @var \DateTime */
    public $InDebt60Day_StartDate;

    /** @var float */
    public $InDebt60Day_PrincipalProportion;

    /** @var \DateTime */
    public $Default_StartDate;

    /** @var int */
    public $DefaultedOnDay;

    /** @var int */
    public $AD;

    /** @var float */
    public $EAD1;

    /** @var float */
    public $EAD2;

    /** @var float */
    public $Recovery;

    /** @var \DateTime */
    public $OnSaleSince;

    /** @var \DateTime */
    public $ScoringDate;

    /** @var int */
    public $ModelVersion;

    /** @var float */
    public $EL;

    /** @var string */
    public $Rating;

    /** @var float */
    public $PrincipalOverdue;


}


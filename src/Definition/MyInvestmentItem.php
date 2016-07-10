<?php

namespace Petslane\Bondora\Definition;

/**
 * MyInvestments list item's information
 */
class MyInvestmentItem extends Definition {

    /**
     * LoanPart unique identifier
     *
     * @var string
     */
    public $LoanPartId;


    /**
     * Investment amount
     *
     * @var float
     */
    public $Amount;


    /**
     * Auction unique identifier
     *
     * @var string
     */
    public $AuctionId;


    /**
     * Auction name
     *
     * @var string
     */
    public $AuctionName;


    /**
     * Auction number
     *
     * @var int
     */
    public $AuctionNumber;


    /**
     * Auction bid number
     *
     * @var int
     */
    public $AuctionBidNumber;


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
     * Residency of the borrower
     *
     * @var string
     */
    public $Country;


    /**
     *     1000 No previous payments problems
     *     900 Payments problems finished 24-36 months ago
     *     800 Payments problems finished 12-24 months ago
     *     700 Payments problems finished 6-12 months ago
     *     600 Payment problems finished &lt;6 months ago
     *     500 Active payment problems
     *
     * @var float
     */
    public $CreditScore;


    /**
     * Bondora Rating issued by the Rating model
     *
     * @var string
     */
    public $Rating;


    /**
     * Interest rate
     *
     * @var float
     */
    public $Interest;


    /**
     * Use of loan
     *
     * Enum: 0, 1, 2, 3, 4, 5, 6, 7, 8, 101, 102, 103, 104, 105, 106, 107, 108, 109, 110, 201, 202, 203, 204, 205, 206, 207, 208, 209, 210, 211, -1
     *
     * @var int
     */
    public $UseOfLoan;


    /**
     * Income verification type
     *
     * Enum: 1, 2, 3, 4
     *
     * @var int
     */
    public $IncomeVerificationStatus;


    /**
     * Loan unique identifier
     *
     * @var string
     */
    public $LoanId;


    /**
     * Loan status code
     *     2 Current
     *     3 Cancelled
     *     100 Overdue
     *     5 60+ days overdue
     *     4 Repaid
     *     8 Released
     *
     * @var int
     */
    public $LoanStatusCode;


    /**
     * Loan status active from
     *
     * @var \DateTime
     */
    public $LoanStatusActiveFrom;


    /**
     * Borrower's username
     *
     * @var string
     */
    public $UserName;


    /**
     * Borrower's Gender
     *
     * Enum: 0, 1, 2
     *
     * @var int
     */
    public $Gender;


    /**
     * Borrower's date of birth
     *
     * @var \DateTime
     */
    public $DateOfBirth;


    /**
     * Loan issued date
     *
     * @var \DateTime
     */
    public $SignedDate;


    /**
     * Last rescheduling date
     *
     * @var \DateTime
     */
    public $ReScheduledOn;


    /**
     * Date and time when the principal part of the payment is overdue (PrincipalLateAmount is greater than zero).
     *
     * @var \DateTime
     */
    public $DebtOccuredOn;


    /**
     * Date and time when loan part payment is overdue (principal, interest or penalty) aka when the dept occured for the loan part (LateAmountTotal is greater than zero).
     *
     * @var \DateTime
     */
    public $DebtOccuredOnForSecondary;


    /**
     * Loan original lenght
     *
     * @var int
     */
    public $LoanDuration;


    /**
     * Next scheduled payment number
     *
     * @var int
     */
    public $NextPaymentNr;


    /**
     * Next scheduled payment date
     *
     * @var \DateTime
     */
    public $NextPaymentDate;


    /**
     * Next scheduled payment amount
     *
     * @var float
     */
    public $NextPaymentSum;


    /**
     * Total number of scheduled payments
     *
     * @var int
     */
    public $NrOfScheduledPayments;


    /**
     * Last payment date
     *
     * @var \DateTime
     */
    public $LastPaymentDate;


    /**
     * Total principal repaid amount
     *
     * @var float
     */
    public $PrincipalRepaid;


    /**
     * Total interest repaid amount
     *
     * @var float
     */
    public $InterestRepaid;


    /**
     * Total late charges paid amount
     *
     * @var float
     */
    public $LateAmountPaid;


    /**
     * Remaining principal amount
     *
     * @var float
     */
    public $PrincipalRemaining;


    /**
     * Principal debt amount
     *
     * @var float
     */
    public $PrincipalLateAmount;


    /**
     * Interest debt amount
     *
     * @var float
     */
    public $InterestLateAmount;


    /**
     * Late charges debt amount
     *
     * @var float
     */
    public $PenaltyLateAmount;


    /**
     * Late amount total
     *
     * @var float
     */
    public $LateAmountTotal;


    /**
     * Total amount of principal written off
     *
     * @var float
     */
    public $PrincipalWriteOffAmount;


    /**
     * Total amount of interest written off
     *
     * @var float
     */
    public $InterestWriteOffAmount;


    /**
     * Total amount of penalty written off
     *
     * @var float
     */
    public $PenaltyWriteOffAmount;


    /**
     * Date when investment was made or purchased from second market
     *
     * @var \DateTime
     */
    public $PurchaseDate;


    /**
     * Investment selling date
     *
     * @var \DateTime
     */
    public $SoldDate;


    /**
     * Investment amount or secondary market purchase price
     *
     * @var float
     */
    public $PurchasePrice;


    /**
     * SecondMarket sale price
     *
     * @var float
     */
    public $SalePrice;


    /**
     * Date when item was listed on secondary market
     *
     * @var \DateTime
     */
    public $ListedInSecondMarketOn;


    /**
     * Latest debt management stage
     *
     * Enum: 1, 2, 7, 9, 14, 15, 16, 20, 22, 23, 24, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42
     * @see \Petslane\Bondora\Enum\DebtManagementEventType
     *
     * @var int
     */
    public $LatestDebtManagementStage;


    /**
     * Latest debt management stage type
     *
     * Enum: 1, 2, 3
     * @see \Petslane\Bondora\Enum\DebtManagementEventStageType
     *
     * @var int
     */
    public $LatestDebtManagementStageType;


    /**
     * Latest debt management date
     *
     * @var \DateTime
     */
    public $LatestDebtManagementDate;


    /**
     * Note owner received loan transfers principal amount
     *
     * @var float
     */
    public $NoteLoanTransfersMainAmount;


    /**
     * Note owner received loan transfers interest amount
     *
     * @var float
     */
    public $NoteLoanTransfersInterestAmount;


    /**
     * Note owner received loan transfers penalties amount
     *
     * @var float
     */
    public $NoteLoanLateChargesPaid;


    /**
     * Note owner received loan transfers earned interest, penalties total amount
     *
     * @var float
     */
    public $NoteLoanTransfersEarningsAmount;


    /**
     * Note owner received loan transfers total amount
     *
     * @var float
     */
    public $NoteLoanTransfersTotalRepaimentsAmount;


    /**
     * @var string
     */
    public $BoughtFromId;

}


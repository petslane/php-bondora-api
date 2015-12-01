<?php

namespace Petslane\Bondora\Definition;

/**
 * SecondaryMarket list item's information
 */
class SecondMarketItem extends Definition {

    /**
     * Item unique identifier
     *
     * @var string
     */
    public $Id;


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
     * Loan status code
     * <para>2 Current</para><para>100 Overdue</para><para>5 60+ days overdue</para><para>4 Repaid</para><para>8 Released</para>
     *
     * @var int
     */
    public $LoanStatusCode;


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
     * Debt occured on date
     *
     * @var \DateTime
     */
    public $DebtOccuredOn;


    /**
     * Debt occured on date
     *
     * @var \DateTime
     */
    public $DebtOccuredOnForSecondary;


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
     * Outstanding principal balance +/- discount or mark-up
     *
     * @var float
     */
    public $Price;


    /**
     * Secondary market purchase fee paid to Bondora
     *
     * @var float
     */
    public $Fee;


    /**
     * Total amount paid for purchase
     *
     * @var float
     */
    public $TotalCost;


    /**
     * Total amount still to be repaid by the borrower. This includes the principal balance, accrued interest and late charges as well as any future scheduled interest payments
     *
     * @var float
     */
    public $OutstandingPayments;


    /**
     * Discount rate percent
     *
     * @var float
     */
    public $DesiredDiscountRate;


    /**
     * @var float
     */
    public $Xirr;


    /**
     * Date when item was published
     *
     * @var \DateTime
     */
    public $ListedOnDate;

}


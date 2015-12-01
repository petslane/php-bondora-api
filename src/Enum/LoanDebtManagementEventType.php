<?php

namespace Petslane\Bondora\Enum;

class LoanDebtManagementEventType {

    const Message = 1;

    const SentToBailiff = 2;

    const ExpeditedPaymentOrderIssued = 7;

    const DebtFullyPaid = 9;

    const SentToDebtRegistry = 14;

    const DebtNotificationEmailSent = 15;

    const LoanDefaulted = 16;

    const DecisionMadeAndDeclared = 20;

    const DeceasedCustomer = 22;

    const CallMade = 23;

    const DebtNotificationSmsSent = 24;
}
<?php

namespace Petslane\Bondora\Enum;

class DebtManagementEventType {

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

    const InHouseCollection = 30;

    const DCA1 = 31;

    const CurePeriod = 32;

    const DCA2 = 33;

    const DCA3 = 34;

    const PaymentOrder = 35;

    const CivilCase = 36;

    const Bailiff = 37;

    const Deceased = 38;

    const DebtRestructuring = 39;

    const Bankruptcy = 40;

    const CriminalCase = 41;

    const WriteOff = 42;

}
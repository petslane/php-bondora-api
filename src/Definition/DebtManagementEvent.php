<?php

namespace Petslane\Bondora\Definition;

class DebtManagementEvent extends Definition {

    /**
     * @var \DateTime
     */
    public $CreatedOn;


    /**
     * Enum: 1, 2, 7, 9, 14, 15, 16, 20, 22, 23, 24, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42
     * @see \Petslane\Bondora\Enum\DebtManagementEventType
     *
     * @var int
     */
    public $EventType;


    /**
     * @var string
     * @deprecated 1.0.2.0 Obsolete: Not used actively anymore
     */
    public $Description;

}


<?php

namespace Petslane\Bondora\Definition;

class DebtManagementEvent extends Definition {

    /**
     * @var \DateTime
     */
    public $CreatedOn;


    /**
     * Enum: 1, 2, 7, 9, 14, 15, 16, 20, 22, 23, 24
     *
     * @var int
     */
    public $EventType;


    /**
     * @var string
     */
    public $Description;

}


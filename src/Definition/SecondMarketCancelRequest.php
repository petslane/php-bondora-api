<?php

namespace Petslane\Bondora\Definition;

/**
 * Cancel secondary market sale request
 */
class SecondMarketCancelRequest extends Definition {

    /**
     * Secondary market item ids to cancel
     *
     * @var string[]
     */
    public $ItemIds;

}


<?php

namespace Petslane\Bondora\Definition;

/**
 * API Error object. Describes the error that occured.
 */
class ApiError extends Definition {

    /**
     * Code of the error. For machine reading.
     *
     * @required
     * @var int
     */
    public $Code;


    /**
     * The error message for human reading.
     *
     * @required
     * @var string
     */
    public $Message;


    /**
     * Error details, if any.
     * For example the non valid Field's name or the Id of the failed object.
     *
     * @var string
     */
    public $Details;

}


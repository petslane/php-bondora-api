<?php

namespace Petslane\Bondora\Definition;

/**
 * List of Represented Organizations for current user.
 */
class ApiResultUserOrganizations extends Definition {

    /**
     * The payload of the response. Type depends on the API request.
     *
     * @var UserOrganization[]
     */
    public $Payload;


    /**
     * Indicates if the request was successfull or not.
     * true if the request was handled successfully, false otherwise.
     *
     * @required
     * @var bool
     */
    public $Success;


    /**
     * Error(s) accociated with the API request.
     *
     * @var ApiError[]
     */
    public $Errors;

}


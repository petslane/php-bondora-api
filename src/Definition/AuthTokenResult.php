<?php

namespace Petslane\Bondora\Definition;

/**
 * Authorization token result
 */
class AuthTokenResult extends Definition {

    /**
     * API token to use for requests
     *
     * @var string
     */
    public $Token;


    /**
     * Token validation time
     *
     * @var \DateTime
     */
    public $ValidUntil;


    /**
     * List of User's represented Organization(s)
     *
     * @var UserOrganization[]
     */
    public $UserOrganizations;

}


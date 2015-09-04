<?php

namespace Petslane\Bondora\Definition;

/**
 * User's credentials as Username and Password.
 */
class UserCredentials extends Definition {

    /**
     * User's username
     *
     * @required
     * @var string
     */
    public $Username;


    /**
     * User's password
     *
     * @required
     * @var string
     */
    public $Password;

}


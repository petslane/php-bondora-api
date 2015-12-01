<?php

namespace Petslane\Bondora\Definition;

/**
 * OAuth Token request parameters
 */
class AccessTokenRequest extends Definition {

    /**
     * Code that was returned from the OAuth Authorize step. Used when requesting token for exchange of authorization
     * code. Set the grant_type to authorization_code.
     *
     * @required
     * @var string
     */
    public $code;

    /**
     * If set, must be the same as the provided in the OAuth Authorize step.
     *
     * @var string
     */
    public $redirect_uri;

    /**
     * Grant type for getting the access token. authorization_code for getting access token for authorization code
     * refresh_token for getting access token for refresh token
     *
     * @required
     * @var string
     */
    public $grant_type;

    /**
     * Identifies the client that is making the request. The value passed in this parameter must exactly match the
     * value in the registred Application.
     *
     * @required
     * @var string
     */
    public $client_id;

    /**
     * The client secret that is created for the Application.
     *
     * @required
     * @var string
     */
    public $client_secret;

}


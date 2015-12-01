<?php

namespace Petslane\Bondora\Definition;

/**
 * OAuth Token request parameters
 */
class AccessTokenResult extends Definition {

    /**
     * Refresh token that can be used to request new access token if the old token is expired. If the token does not
     * support refreshing or the access token lifetime is not set, this will be null.
     *
     * @var string
     */
    public $refresh_token;

    /**
     * Scope(s) that the user has selected in the Authorization step.
     *
     * @var string
     */
    public $scope;

    /**
     * Identifies the type of token returned. At this time, this field will always have the value Bearer.
     *
     * @required
     * @var string
     */
    public $token_type;

    /**
     * The token that must be sent to a API.
     *
     * @required
     * @var string
     */
    public $access_token;

    /**
     * The lifetime in seconds of the access token. For example, the value "3600" denotes that the access token will
     * expire in one hour from the time the response was generated. 0 is used when the token dows not expire.
     *
     * @var int
     */
    public $expires_in;

}


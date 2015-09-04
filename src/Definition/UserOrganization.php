<?php

namespace Petslane\Bondora\Definition;

/**
 * Represented Organization for User
 */
class UserOrganization extends Definition {

    /**
     * Organization Id
     *
     * @required
     * @var string
     */
    public $Id;


    /**
     * Organization name
     *
     * @required
     * @var string
     */
    public $Name;


    /**
     * Date until the representation is active.
     * Null if no end date specified.
     *
     * @var \DateTime
     */
    public $ActiveToDate;


    /**
     * If the representation type is read only.
     *
     * @required
     * @var bool
     */
    public $IsReadonly;

}


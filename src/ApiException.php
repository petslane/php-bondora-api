<?php

namespace Petslane\Bondora;

use Petslane\Bondora\Definition\ApiError;

class ApiException extends \Exception {
    /**
     * @var ApiError[]
     */
    private $errors = array();

    /**
     * @param ApiError[] $errors
     */
    public function __construct($errors) {
        $this->errors = $errors;
    }

    /**
     * @return ApiError[]
     */
    public function getErrors() {
        return $this->errors;
    }
}

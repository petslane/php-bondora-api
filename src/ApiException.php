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
        if ($errors) {
            $this->message = 'Api responded with errors:';
            foreach ($errors as $error) {
                $this->message .= ' ' . $error->Code . ' - ' . $error->Message . ' - ' . $error->Details . ';';
            }
        }
    }

    /**
     * @return ApiError[]
     */
    public function getErrors() {
        return $this->errors;
    }
}

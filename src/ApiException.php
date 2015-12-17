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
        $message = '';
        if ($errors) {
            $message = 'Api responded with errors:';
            foreach ($errors as $error) {
                $message .= ' ' . $error->Code . ' - ' . $error->Message . ' - ' . $error->Details . ';';
            }
        }
        parent::__construct($message);
    }

    /**
     * @return ApiError[]
     */
    public function getErrors() {
        return $this->errors;
    }
}

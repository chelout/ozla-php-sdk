<?php

namespace Chelout\PhpSdk\Exceptions;

use Exception;

class ValidationException extends Exception
{
    public $errors = [];

    public function __construct(string $message, array $errors)
    {
        // $message = json_decode($message)->message;

        parent::__construct($message);

        $this->errors = $errors;
    }
}

<?php

namespace Chelout\PhpSdk\Exceptions;

use Exception;

class FailedActionException extends Exception
{
    public function __construct(string $message)
    {
        // $message = json_decode($message)->message;

        parent::__construct($message);
    }
}

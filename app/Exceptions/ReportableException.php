<?php

namespace App\Exceptions;

use Exception;

abstract class ReportableException extends Exception
{
    protected int $httpStatusCode = 500;

    public function httpStatusCode(): int
    {
        return $this->httpStatusCode;
    }
}

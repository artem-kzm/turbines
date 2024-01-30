<?php

namespace App\Exceptions;

class ValidationException extends ReportableException
{
    protected int $httpStatusCode = 422;

    public function __construct(array $errors)
    {
        $message = json_encode(['validation errors' => $errors], JSON_THROW_ON_ERROR);
        parent::__construct($message);
    }
}

<?php

namespace App\Exceptions\Http;

use App\Exceptions\ReportableException;

class NotFoundException extends ReportableException
{
    protected int $httpStatusCode = 404;
}

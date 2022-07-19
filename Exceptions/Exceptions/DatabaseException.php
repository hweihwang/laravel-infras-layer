<?php

declare(strict_types=1);

namespace Support\Exceptions\Exceptions;

class DatabaseException extends AbstractException
{
    protected string $key = 'ERROR_DATABASE';

    protected int $statusCode = 400;

    protected string $responseMessage = 'Something went wrong with the database';
}

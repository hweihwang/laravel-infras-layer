<?php

declare(strict_types=1);

namespace Support\Exceptions\Exceptions;

use Support\Exceptions\Concerns\ExceptionCustomizableTrait;

class DefaultException extends AbstractException
{
    use ExceptionCustomizableTrait;

    protected string $key = 'ERROR_INTERNAL';

    protected int $statusCode = 500;

    protected string $responseMessage = 'An unexpected error occurred';
}

<?php

declare(strict_types=1);

namespace Support\Exceptions\Exceptions;

class NotFoundEntityException extends AbstractEntityException
{
    protected string $key = 'ERR_NOT_FOUND_ENTITY';

    protected string $responseMessage = '%s not found';
}

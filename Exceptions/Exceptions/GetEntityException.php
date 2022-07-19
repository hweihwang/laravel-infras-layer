<?php

declare(strict_types=1);

namespace Support\Exceptions\Exceptions;

class GetEntityException extends AbstractEntityException
{
    protected string $key = 'ERROR_GET_ENTITY';

    protected string $responseMessage = 'Cannot get %s';
}

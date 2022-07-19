<?php

declare(strict_types=1);

namespace Support\Exceptions\Exceptions;

class CreateEntityException extends AbstractEntityException
{
    protected string $key = 'ERROR_CREATE_ENTITY';

    protected string $responseMessage = 'Cannot create %s';
}

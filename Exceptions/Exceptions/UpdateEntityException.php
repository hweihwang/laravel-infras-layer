<?php

declare(strict_types=1);

namespace Support\Exceptions\Exceptions;

class UpdateEntityException extends AbstractEntityException
{
    protected string $key = 'ERROR_UPDATE_ENTITY';

    protected string $responseMessage = 'Cannot update %s';
}

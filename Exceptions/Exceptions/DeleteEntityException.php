<?php

declare(strict_types=1);

namespace Support\Exceptions\Exceptions;

class DeleteEntityException extends AbstractEntityException
{
    protected string $key = 'ERROR_DELETE_ENTITY';

    protected string $responseMessage = 'Cannot delete %s';
}

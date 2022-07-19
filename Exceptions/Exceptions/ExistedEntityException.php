<?php

declare(strict_types=1);

namespace Support\Exceptions\Exceptions;

class ExistedEntityException extends AbstractEntityException
{
    protected string $key = 'ERROR_EXISTED_ENTITY';

    protected string $responseMessage = '%s already exists';
}

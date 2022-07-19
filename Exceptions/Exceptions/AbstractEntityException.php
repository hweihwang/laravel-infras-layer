<?php

declare(strict_types=1);

namespace Support\Exceptions\Exceptions;

abstract class AbstractEntityException extends AbstractException
{
    protected int $statusCode = 400;

    protected string $entity = '';

    public function message(): string
    {
        return sprintf($this->responseMessage, $this->entity);
    }

    public function setEntity(string $entity): static
    {
        $this->entity = $entity;

        return $this;
    }
}

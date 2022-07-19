<?php

declare(strict_types=1);

namespace Support\Exceptions\Exceptions;

class InvalidRequestException extends AbstractException
{
    protected string $key = 'ERROR_INVALID_REQUEST';

    protected string $responseMessage = 'Request is invalid';

    protected array $errors = [];

    public function setErrors(array $errors): self
    {
        $this->errors = $errors;

        return $this;
    }

    public function message(): string
    {
        return json_encode($this->errors);
    }
}

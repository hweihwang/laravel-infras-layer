<?php

declare(strict_types=1);

namespace Support\Exceptions\Exceptions;

use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;
use Support\Transportation\API\Concerns\APIFoundationTrait;

abstract class AbstractException extends Exception
{
    use APIFoundationTrait;

    protected string $key;

    protected int $statusCode;

    protected string $responseMessage;

    protected string $log;

    public function message(): string
    {
        return $this->responseMessage;
    }

    final public function render(): JsonResponse
    {
        Log::info($this->getTraceAsString());

        return $this->error(
            __($this->message()),
            $this->key,
            $this->statusCode
        );
    }
}

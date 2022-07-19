<?php

declare(strict_types=1);

namespace Support\Listeners\External\Middleware;

use Illuminate\Support\Facades\Validator;

abstract class AbstractMiddleware
{
    protected array $rules = [];

    public function handle(array $eventPayload): bool
    {
        $validator = Validator::make($eventPayload, $this->rules);

        return $validator->passes();
    }
}

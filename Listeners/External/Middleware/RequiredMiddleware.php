<?php

declare(strict_types=1);

namespace Support\Listeners\External\Middleware;

class RequiredMiddleware extends AbstractMiddleware
{
    protected array $rules = [
        'event_type' => 'required|string',
        'event_body' => 'required|array',
        'event_id' => 'required|string',
        'event_time' => 'required|int',
        'event_version' => 'required|int',
    ];
}

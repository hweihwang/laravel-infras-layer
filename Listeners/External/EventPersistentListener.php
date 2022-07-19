<?php

declare(strict_types=1);

namespace Support\Listeners\External;

use Support\Repositories\EventRepositoryInterface;

class EventPersistentListener
{
    public function __construct(private readonly EventRepositoryInterface $eventRepository)
    {
    }

    public function handle(array $eventPayload): void
    {
        $this->eventRepository->add($eventPayload);
    }
}

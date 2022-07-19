<?php

declare(strict_types=1);

namespace Support\Events;

interface DomainEventInterface
{
    public function getEventId();

    public function getEventBody();

    public function getEventTime();

    public function getEventType();

    public function getEventVersion();
}

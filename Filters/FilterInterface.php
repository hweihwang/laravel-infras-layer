<?php

declare(strict_types=1);

namespace Support\Filters;

interface FilterInterface
{
    public function fromArray(array $data): self;

    public function toArray(): array;
}

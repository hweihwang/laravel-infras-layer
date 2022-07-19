<?php

declare(strict_types=1);

namespace Support\DTOs;

interface DTOInterface
{
    public function fromArray(array $data): self;

    public function toArray(): array;
}

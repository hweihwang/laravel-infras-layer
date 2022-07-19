<?php

declare(strict_types=1);

namespace Support\Services;

use Support\DTOs\DTOInterface;

interface ServiceInterface
{
    public function execute(DTOInterface $dto);
}

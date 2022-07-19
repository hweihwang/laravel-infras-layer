<?php

declare(strict_types=1);

namespace Support\Transportation\API\FormRequests;

use Support\DTOs\DTOInterface;
use Support\Filters\FilterInterface;

interface FormRequestInterface
{
    public function data(DTOInterface $dto, FilterInterface $filter = null): DTOInterface;
}

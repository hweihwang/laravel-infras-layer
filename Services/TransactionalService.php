<?php

declare(strict_types=1);

namespace Support\Services;

use Support\DTOs\DTOInterface;
use Support\Services\Session\TransactionalSessionInterface;

class TransactionalService implements ServiceInterface
{
    public function __construct(private readonly ServiceInterface $service, private readonly TransactionalSessionInterface $session)
    {
    }

    public function execute(DTOInterface $dto)
    {
        $operation = fn () => $this->service->execute($dto);

        return $this->session->executeAtomically($operation);
    }
}

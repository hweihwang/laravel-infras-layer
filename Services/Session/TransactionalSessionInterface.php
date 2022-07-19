<?php

declare(strict_types=1);

namespace Support\Services\Session;

interface TransactionalSessionInterface
{
    public function executeAtomically(callable $callback);
}

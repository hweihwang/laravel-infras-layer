<?php

declare(strict_types=1);

namespace Support\Services\Session;

use Illuminate\Support\Facades\DB;

class QueryBuilderSession implements TransactionalSessionInterface
{
    public function executeAtomically(callable $callback)
    {
        return DB::transaction($callback);
    }
}

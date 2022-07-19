<?php

declare(strict_types=1);

namespace Support\Transportation\API\Paging;

use Illuminate\Contracts\Pagination\Paginator;

interface PagingInterface
{
    public function fromPaginator(Paginator $paginator): self;

    public function toArray(): array;
}

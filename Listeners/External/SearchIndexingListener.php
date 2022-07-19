<?php

declare(strict_types=1);

namespace Support\Listeners\External;

use Support\Exceptions\Exceptions\DefaultException;
use Support\Repositories\FullTextSearchRepository\FullTextSearchRepositoryInterface;

class SearchIndexingListener
{
    public function __construct(
        protected FullTextSearchRepositoryInterface $repository,
        protected string $indexType = 'add')
    {
    }

    /**
     * @throws DefaultException
     */
    public function handle(array $eventPayload): void
    {
        if (! method_exists($this->repository, $this->indexType)) {
            throw new DefaultException();
        }

        if (! isset($eventPayload['event_body'])) {
            throw new DefaultException();
        }

        $eventBody = $eventPayload['event_body'];

        $this->repository->{$this->indexType}($eventBody);
    }
}

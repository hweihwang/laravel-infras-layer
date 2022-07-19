<?php

declare(strict_types=1);

namespace Support\Repositories\FullTextSearchRepository;

use Support\Events\External\SearchAndPublishableEvent;
use Support\Repositories\EventRepositoryInterface;

class ElasticsearchEventRepository extends AbstractElasticsearchRepository implements EventRepositoryInterface
{
    public function __construct(SearchAndPublishableEvent $model)
    {
        $this->model = $model;
    }
}

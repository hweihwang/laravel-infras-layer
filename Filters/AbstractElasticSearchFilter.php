<?php

declare(strict_types=1);

namespace Support\Filters;

use JeroenG\Explorer\Domain\Syntax\Term;

abstract class AbstractElasticSearchFilter implements FullTextSearchFilterInterface
{
    public array $data = [];

    public function __construct(
        public array $must = [],
        public array $should = [],
        public array $filter = []
    ) {
    }

    public function fromArray(array $data): FilterInterface
    {
        $this->data = $data;

        foreach ($data as $key => $value) {
            $this->must[] = new Term($key, $value, 1);
        }

        return $this;
    }

    public function toArray(): array
    {
        return $this->data;
    }
}

<?php

declare(strict_types=1);

namespace Support\Mixins;

interface ScoutBuilderMacrosInterface
{
    public function getData();

    public function paginateData();

    public function applyFilters();
}

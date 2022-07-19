<?php

declare(strict_types=1);

namespace Support\Providers;

use Illuminate\Support\ServiceProvider;
use Module\Product\Providers\ProductServiceProvider;
use Module\ProductOption\Providers\ProductOptionServiceProvider;

class DomainServiceProvider extends ServiceProvider
{
    private array $modules = [
        ProductServiceProvider::class,
        ProductOptionServiceProvider::class,
    ];

    public function register()
    {
        foreach ($this->modules as $module) {
            $this->app->register($module);
        }
    }
}

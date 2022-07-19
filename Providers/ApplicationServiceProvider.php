<?php

declare(strict_types=1);

namespace Support\Providers;

use App\NiceSpace\Providers\NicespaceServiceProvider;
use Illuminate\Support\ServiceProvider;

class ApplicationServiceProvider extends ServiceProvider
{
    private array $apps = [
        NicespaceServiceProvider::class,
    ];

    public function register()
    {
        foreach ($this->apps as $app) {
            $this->app->register($app);
        }
    }
}

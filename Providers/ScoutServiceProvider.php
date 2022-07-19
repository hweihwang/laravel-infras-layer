<?php

declare(strict_types=1);

namespace Support\Providers;

use Illuminate\Support\ServiceProvider;
use Laravel\Scout\Builder;
use Support\Mixins\BaseScoutBuilderMacros;
use Support\Mixins\ScoutBuilderMacros;

class ScoutServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->app->singleton(BaseScoutBuilderMacros::class, ScoutBuilderMacros::class);
        $this->app->singleton('ScoutBuilderMacros', ScoutBuilderMacros::class);

        Builder::mixin($this->app->make('ScoutBuilderMacros'));
    }
}

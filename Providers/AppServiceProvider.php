<?php

declare(strict_types=1);

namespace Support\Providers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\ServiceProvider;
use Support\Repositories\EventRepositoryInterface;
use Support\Repositories\FullTextSearchRepository\ElasticsearchEventRepository;
use Support\Services\Session\QueryBuilderSession;
use Support\Services\Session\TransactionalSessionInterface;
use Support\Transportation\API\Paging\LengthAwarePaging;
use Support\Transportation\API\Paging\PagingInterface;
use Support\Transportation\API\Response\ErrorResponseInterface;
use Support\Transportation\API\Response\SuccessResponseInterface;
use Support\Transportation\API\Response\SymphonyJsonErrorResponse;
use Support\Transportation\API\Response\SymphonyJsonSuccessResponse;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(TransactionalSessionInterface::class, QueryBuilderSession::class);

        $this->app->singleton(EventRepositoryInterface::class, ElasticsearchEventRepository::class);

        $this->app->singleton(PagingInterface::class, LengthAwarePaging::class);

        $this->app->singleton(SuccessResponseInterface::class, SymphonyJsonSuccessResponse::class);

        $this->app->singleton(ErrorResponseInterface::class, SymphonyJsonErrorResponse::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        DB::listen(function ($query) {
            File::append(
                storage_path('/logs/query.log'),
                '['.date('Y-m-d H:i:s').']'.PHP_EOL.$query->sql.' ['.implode(', ', $query->bindings).']'.PHP_EOL.PHP_EOL
            );
        });
    }
}

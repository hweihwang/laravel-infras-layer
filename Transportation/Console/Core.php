<?php

namespace Support\Transportation\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Module\Product\Commands\SyncDataCommand as SyncProductData;
use Module\ProductOption\Commands\SyncDataCommand as SyncProductOptionData;

class Core extends ConsoleKernel
{
    protected $commands = [
        SyncProductData::class,
        SyncProductOptionData::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')->hourly();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');
    }
}

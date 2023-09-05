<?php

namespace Insyht\LarvelousBaseBlocks\Providers;

use Illuminate\Support\ServiceProvider;

class BaseBlocksServiceProvider extends ServiceProvider
{
    public function register()
    {
        //
    }

    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__ . '/../../database/migrations');
        $this->loadViewsFrom(__DIR__ . '/../../resources/views', 'insyht-larvelous-base-blocks');
    }
}

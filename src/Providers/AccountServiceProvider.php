<?php

namespace ConfrariaWeb\Account\Providers;

use ConfrariaWeb\Account\Commands\GenerateInvoices;
use Illuminate\Support\ServiceProvider;

class AccountServiceProvider extends ServiceProvider
{

    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/../Routes/api.php');
        $this->loadMigrationsFrom(__DIR__ . '/../../databases/Migrations');
        $this->publishes([__DIR__ . '/../../config/cw_account.php' => config_path('cw_account.php')], 'config');

        if ($this->app->runningInConsole()) {
            $this->commands([
                GenerateInvoices::class
            ]);
        }
    }

    public function register()
    {

    }

}

<?php

namespace ConfrariaWeb\Account\Providers;

use Illuminate\Support\ServiceProvider;
use ConfrariaWeb\Account\Contracts\AccountContract;
use ConfrariaWeb\Account\Repositories\AccountRepository;
use ConfrariaWeb\Account\Services\AccountService;
use ConfrariaWeb\Vendor\Traits\ProviderTrait;

class AccountServiceProvider extends ServiceProvider {

    use ProviderTrait;
    
    public function boot() {
        $this->loadRoutesFrom(__DIR__ . '/../Routes/web.php');
        $this->loadRoutesFrom(__DIR__ . '/../Routes/api.php');
        $this->loadMigrationsFrom(__DIR__ . '/../../databases/Migrations');
        $this->publishes([__DIR__ . '/../../config/cw_account.php' => config_path('cw_account.php')], 'config');
        $this->registerSeedsFrom(__DIR__.'/../../databases/Seeds');
    }

    public function register() {
        $this->app->bind(AccountContract::class, AccountRepository::class);
        $this->app->bind('AccountService', function ($app) {
            return new AccountService($app->make(AccountContract::class));
        });
    }

}

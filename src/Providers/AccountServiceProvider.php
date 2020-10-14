<?php

namespace ConfrariaWeb\Account\Providers;

use App\Models\User;
use ConfrariaWeb\Account\Commands\GenerateInvoices;
use ConfrariaWeb\Account\Contracts\AccountContract;
use ConfrariaWeb\Account\Contracts\PlanContract;
use ConfrariaWeb\Account\Observers\RoleObserver;
use ConfrariaWeb\Account\Observers\SiteObserver;
use ConfrariaWeb\Account\Observers\UserObserver;
use ConfrariaWeb\Account\Repositories\AccountRepository;
use ConfrariaWeb\Account\Repositories\PlanRepository;
use ConfrariaWeb\Account\Services\AccountService;
use ConfrariaWeb\Account\Services\PlanService;
use ConfrariaWeb\Acl\Models\Role;
use ConfrariaWeb\Site\Models\Site;
use ConfrariaWeb\Vendor\Traits\ProviderTrait;
use Illuminate\Support\ServiceProvider;

class AccountServiceProvider extends ServiceProvider
{
    use ProviderTrait;

    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/../Routes/web.php');
        $this->loadRoutesFrom(__DIR__ . '/../Routes/api.php');
        $this->loadViewsFrom(__DIR__ . '/../Views', 'account');
        $this->loadMigrationsFrom(__DIR__ . '/../../databases/Migrations');
        $this->publishes([__DIR__ . '/../../config/cw_account.php' => config_path('cw_account.php')], 'config');
        $this->registerSeedsFrom(__DIR__ . '/../../databases/Seeds');

        Role::observe(RoleObserver::class);
        Site::observe(SiteObserver::class);
        User::observe(UserObserver::class);

        if ($this->app->runningInConsole()) {
            $this->commands([
                GenerateInvoices::class
            ]);
        }
    }

    public function register()
    {
        $this->app->bind(AccountContract::class, AccountRepository::class);
        $this->app->bind('AccountService', function ($app) {
            return new AccountService($app->make(AccountContract::class));
        });

        $this->app->bind(PlanContract::class, PlanRepository::class);
        $this->app->bind('PlanService', function ($app) {
            return new PlanService($app->make(PlanContract::class));
        });
    }

}

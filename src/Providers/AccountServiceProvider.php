<?php

namespace ConfrariaWeb\Account\Providers;

use App\Models\User;
use ConfrariaWeb\Account\Commands\GenerateInvoices;
use ConfrariaWeb\Account\Contracts\AccountContract;
use ConfrariaWeb\Account\Contracts\PlanContract;
use ConfrariaWeb\Account\Observers\DomainAccountObserver;
use ConfrariaWeb\Account\Observers\PostAccountObserver;
use ConfrariaWeb\Account\Observers\PostCategoryAccountObserver;
use ConfrariaWeb\Account\Observers\PostSectionAccountObserver;
use ConfrariaWeb\Account\Observers\RealEstatePropertyObserver;
use ConfrariaWeb\Account\Observers\RoleAccountObserver;
use ConfrariaWeb\Account\Observers\SiteAccountObserver;
use ConfrariaWeb\Account\Observers\UserObserver;
use ConfrariaWeb\Account\Repositories\AccountRepository;
use ConfrariaWeb\Account\Repositories\PlanRepository;
use ConfrariaWeb\Account\Services\AccountService;
use ConfrariaWeb\Account\Services\PlanService;
use ConfrariaWeb\Acl\Models\Role;
use ConfrariaWeb\Domain\Models\Domain;
use ConfrariaWeb\Post\Models\Post;
use ConfrariaWeb\Post\Models\PostCategory;
use ConfrariaWeb\Post\Models\PostSection;
use ConfrariaWeb\RealEstate\Models\Property;
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
        
        Domain::observe(DomainAccountObserver::class);
        /*Post::observe(PostAccountObserver::class);
        PostCategory::observe(PostCategoryAccountObserver::class);
        PostSection::observe(PostSectionAccountObserver::class);
        Role::observe(RoleAccountObserver::class);
        Site::observe(SiteAccountObserver::class);*/
        Property::observe(RealEstatePropertyObserver::class);
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

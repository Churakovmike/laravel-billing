<?php

declare(strict_types=1);

namespace ChurakovMike\Finance;

use ChurakovMike\Finance\Services\AccountService;
use Illuminate\Support\ServiceProvider;

/**
 * Class FinanceServiceProvider.
 * @package ChurakovMike\Finance
 */
class FinanceServiceProvider extends ServiceProvider
{
    /**
     * @inheritdoc
     */
    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__ . '/Database');
    }

    /**
     * @inheritdoc
     */
    public function register()
    {
        $this->app->bind('finance-account',function(){
            return new AccountService();
        });
    }
}

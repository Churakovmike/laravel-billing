<?php

declare(strict_types=1);

namespace ChurakovMike\Finance;

use Illuminate\Support\ServiceProvider;

/**
 * Class FinanceServiceProvider.
 * @package ChurakovMike\Finance
 */
class FinanceServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__ . '/Database');
    }
}

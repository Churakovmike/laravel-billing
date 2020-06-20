<?php

declare(strict_types=1);

namespace ChurakovMike\Finance\Facades;

use ChurakovMike\Finance\Services\AccountService;
use Illuminate\Support\Facades\Facade;

/**
 * Class Account.
 * @package ChurakovMike\Finance\Facades
 *
 * @method AccountService addAccountType()
 * @method AccountService addAccount()
 */
class Account extends Facade
{
    /**
     * @return string|void
     */
    protected static function getFacadeAccessor()
    {
        return 'finance-account';
    }
}

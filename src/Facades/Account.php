<?php

declare(strict_types=1);

namespace ChurakovMike\Finance\Facades;

use ChurakovMike\Finance\Services\AccountService;
use Illuminate\Support\Facades\Facade;

/**
 * Class Account.
 * @package ChurakovMike\Finance\Facades
 *
 * @method static AccountService addAccountType(string $name)
 * @method static AccountService addAccount(int $accountType, int $userId)
 * @method static AccountService removeAccountType(int $id)
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

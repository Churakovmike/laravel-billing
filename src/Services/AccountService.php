<?php

declare(strict_types=1);

namespace ChurakovMike\Finance\Services;

use ChurakovMike\Finance\Models\Account;
use ChurakovMike\Finance\Models\AccountType;

/**
 * Class AccountService
 * @package ChurakovMike\Finance\Services
 */
class AccountService
{
    /**
     * Create new account type.
     * @param string $name
     * @return mixed
     */
    public static function addAccountType(string $name)
    {
        return AccountType::create(['name' => $name]);
    }

    /**
     * Create new account.
     * @param int $accountType
     * @param int $userId
     * @return mixed
     */
    public static function addAccount(int $accountType, int $userId)
    {
        return Account::create([
            'type_id' => $accountType,
            'user_id' => $userId,
            'balance' => 0.00,
        ]);
    }

    /**
     * Remove account type.
     * @param int $id
     * @return int
     */
    public static function removeAccountType(int $id)
    {
        return AccountType::destroy($id);
    }
}

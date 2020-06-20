<?php

declare(strict_types=1);

namespace ChurakovMike\Finance\Traits;

use App\User;

/**
 * This trait must be used to the user model.
 * Trait AccountBillable
 * @package ChurakovMike\Finance\Traits
 */
trait AccountBillable
{
    public function transferTo(User $user, $amount, $accountType = null)
    {
        //
    }

    public function transferToTransit($amount)
    {
        //
    }

    public function getAccounts()
    {
        //
    }
}

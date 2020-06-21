<?php

declare(strict_types=1);

namespace ChurakovMike\Finance\Traits;

use App\User;
use ChurakovMike\Finance\Models\Account;
use ChurakovMike\Finance\Models\Operation;
use Illuminate\Support\Facades\DB;

/**
 * This trait must be used to the user model.
 * Trait AccountBillable
 * @package ChurakovMike\Finance\Traits
 */
trait AccountBillable
{
    /**
     * @param User $user
     * @param $amount
     * @param null $accountType
     * @throws \Throwable
     */
    public function transferTo(User $user, $amount, $accountType = null)
    {
        if (is_null($accountType)) {
            $accountType = Account::TYPE_MAIN;
        }

        DB::beginTransaction();
        try {
            $account = $this->getAccounts()
                ->where('type_id', $accountType)
                ->firstOrFail();

            $transferAccount = $user->getAccounts()
                ->where('type_id', $accountType)
                ->firstOrFail();

            $account->update([
                'balance' => $account->balance - $amount,
            ]);

            $transferAccount->update([
                'balance' => $transferAccount->balance + $amount,
            ]);

            Operation::create([
                'account_from' => $account->id,
                'account_to' => $transferAccount->id,
                'amount' => $amount,
                'comment' => "Transfer momey from {$this->email} to {$user->email}",
            ]);
            DB::commit();
        } catch (\Throwable $exception) {
            DB::rollBack();
            throw $exception;
        }
    }

    /**
     * @param $amount
     * @throws \Throwable
     */
    public function transferToTransit($amount)
    {
        DB::beginTransaction();
        try {
            $transitAccount = $this->getAccounts()
                ->where('type_id', Account::TYPE_TRANSIT)
                ->firstOrFail();

            $transitAccount->update([
                'balance' => $transitAccount->balance + $amount,
            ]);

            DB::commit();
        } catch (\Throwable $exception) {
            DB::rollBack();
            throw $exception;
        }
    }

    /**
     * @return mixed
     */
    public function getAccounts()
    {
        return $this->hasMany(Account::class);
    }
}

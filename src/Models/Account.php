<?php

declare(strict_types=1);

namespace ChurakovMike\Finance\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Account.
 * @package ChurakovMike\Models
 *
 * @property integer $id
 * @property integer $type_id
 * @property double $balance
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $deleted_at
 */
class Account extends Model
{
    /**
     * Main account types
     */
    const
        TYPE_MAIN = 1,
        TYPE_TRANSIT = 2,
        TYPE_TEST = 20;

    /**
     * @var string $table
     */
    protected $table = 'accounts';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function type()
    {
        return $this->hasOne(AccountType::class);
    }
}

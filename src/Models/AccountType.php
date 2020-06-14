<?php

declare(strict_types=1);

namespace ChurakovMike\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class AccountType.
 * @package ChurakovMike\Models
 *
 * @property integer $id
 * @property string $name
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $deleted_at
 */
class AccountType extends Model
{
    /**
     * @var string $table
     */
    protected $table = 'account_type';
}

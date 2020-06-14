<?php

declare(strict_types=1);

namespace ChurakovMike\Models;

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
     * @var string $table
     */
    protected $table = 'account';
}

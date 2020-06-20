<?php

declare(strict_types=1);

namespace ChurakovMike\Finance\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Operation
 * @package ChurakovMike\Finance\Models
 *
 * @property int $account_from
 * @property int $account_to
 * @property string $comment
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $deleted_at
 */
class Operation extends Model
{
    /**
     * @var string
     */
    protected $table = 'operations';
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Transaction
 * @package App
 * @property string $reference
 * @property Order $order
 * @property string $type
 * @property string $amount
 * @property Model $loggable
 * @property string $status
 */
class Transaction extends Model
{
    protected $fillable = ['reference', 'order_id', 'type', 'amount', 'loggable', 'status'];

    public static $transaction_types = ['DEBIT', 'CREDIT'];
    public static $transaction_statuses = ['COMPLETED', 'PROCESSING', 'CANCELLED'];

    public function loggable()
    {
        return $this->morphTo();
    }
}

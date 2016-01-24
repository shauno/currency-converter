<?php

namespace Mukuru\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'currency_from',
        'currency_to',
        'rate',
        'amount_paid',
        'amount_bought',
        'amount_surcharge',
        'amount_discount',
        'amount_total',
    ];
}

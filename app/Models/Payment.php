<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'order_id',
        'method',
        'card_holder',
        'number',
        'date_expiry',
        'cvc'
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
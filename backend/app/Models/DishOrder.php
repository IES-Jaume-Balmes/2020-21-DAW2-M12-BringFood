<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DishOrder extends Model
{
    use HasFactory;

    protected $table = 'dish_order';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    	'dish_id',
        'order_id',
        'date_request',
        'date_send',
        'date_deliver',
    ];
}

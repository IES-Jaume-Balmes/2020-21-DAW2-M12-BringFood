<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'via',
        'name',
        'number',
        'floor',
        'door',
        'stair',
        'zip_code',
        //'user_id',
    ];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

}
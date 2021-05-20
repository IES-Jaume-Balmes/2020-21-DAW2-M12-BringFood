<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{
    use HasFactory;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'name',
        'detail',
        'img_url',
        'price',
    ];

    public function orders()
    {
        return $this->belongsToMany(Order::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['user_id','dish_id','quantity','status'];

    public function dish()
    {
        return $this->belongsTo('App\Dish');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}

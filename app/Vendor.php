<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    protected $fillable = ['name','logo'];
    
    public function tags()
    {
        return $this->morphToMany('App\Tag', 'taggable');
    }
}

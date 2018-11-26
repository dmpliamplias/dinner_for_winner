<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{

    public function person()
    {
        return $this->belongsTo('App\Person');
    }

    public function products()
    {
        return $this->belongsToMany('App\Product')
            ->withTimestamps();
    }

}

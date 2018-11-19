<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{

    public function person()
    {
        return $this->belongsTo('App\Person', 'person_id', 'id');
    }

    public function products()
    {
        return $this->belongsToMany('App\Product');
    }

}

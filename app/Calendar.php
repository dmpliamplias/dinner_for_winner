<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Calendar extends Model
{

    public function recipe()
    {
        return $this->belongsTo('App\Recipe');
    }

    public function person()
    {
        return $this->belongsTo('App\Person');
    }

}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}

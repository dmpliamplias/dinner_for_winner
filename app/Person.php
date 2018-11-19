<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function recipes()
    {
        return $this->hasMany('App\Recipe');
    }

    public function familyMembers()
    {
        return $this->hasMany('App\FamilyMember');
    }

}

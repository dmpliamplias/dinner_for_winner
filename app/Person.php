<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

    public function recipes()
    {
        return $this->hasMany('App\Recipe', 'recipe_id', 'id');
    }

    public function familyMembers()
    {
        return $this->hasMany('App\FamilyMember', 'family_members_id', 'id');
    }

}

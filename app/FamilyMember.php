<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FamilyMember extends Model
{

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function person()
    {
        return $this->belongsTo('App\Person');
    }

}

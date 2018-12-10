<?php

namespace App\Policies;

use App\User;
use App\Calendar;
use Illuminate\Auth\Access\HandlesAuthorization;

class CalendarPolicy
{

    use HandlesAuthorization;

    public function unconfirm(User $user, Calendar $calendar)
    {
        return $user->person()->getResults()->id === $calendar->person()->getResults()->id;
    }

    public function store(User $user, Calendar $calendar)
    {
        return $user->person()->getResults()->id === $calendar->person()->getResults()->id;
    }

    public function newRecipe(User $user, Calendar $calendar)
    {
        return $user->person()->getResults()->id === $calendar->person()->getResults()->id;
    }

}

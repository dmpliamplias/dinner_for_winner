<?php

namespace App\Policies;

use App\User;
use App\Person;
use Illuminate\Auth\Access\HandlesAuthorization;

class PersonPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the person.
     *
     * @param  \App\User  $user
     * @param  \App\Person  $person
     * @return mixed
     */
    public function view(User $user, Person $person)
    {
        return $user->person()->id == $person->user()->id;
    }

    /**
     * Determine whether the user can create people.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can update the person.
     *
     * @param  \App\User  $user
     * @param  \App\Person  $person
     * @return mixed
     */
    public function update(User $user, Person $person)
    {
        return $user->id == $person->user_id;
    }

    /**
     * Determine whether the user can delete the person.
     *
     * @param  \App\User  $user
     * @param  \App\Person  $person
     * @return mixed
     */
    public function delete(User $user, Person $person)
    {
        return $user->person()->id == $person->user()->id;
    }

    /**
     * Determine whether the user can restore the person.
     *
     * @param  \App\User  $user
     * @param  \App\Person  $person
     * @return mixed
     */
    public function restore(User $user, Person $person)
    {
        return $user->person()->id == $person->user()->id;
    }

    /**
     * Determine whether the user can permanently delete the person.
     *
     * @param  \App\User  $user
     * @param  \App\Person  $person
     * @return mixed
     */
    public function forceDelete(User $user, Person $person)
    {
        return $user->person()->id == $person->user()->id;
    }
}

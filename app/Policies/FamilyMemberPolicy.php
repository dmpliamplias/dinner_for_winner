<?php

namespace App\Policies;

use App\User;
use App\FamilyMember;
use Illuminate\Auth\Access\HandlesAuthorization;

class FamilyMemberPolicy
{

    use HandlesAuthorization;

    public function show(User $user, FamilyMember $familyMember)
    {
        return $user->person()->getResults()->id === $familyMember->person()->getResults()->id;
    }

    public function update(User $user, FamilyMember $familyMember)
    {
        return $user->person()->getResults()->id === $familyMember->person()->getResults()->id;
    }

    public function delete(User $user, FamilyMember $familyMember)
    {
        return $user->person()->getResults()->id === $familyMember->person()->getResults()->id;
    }

}

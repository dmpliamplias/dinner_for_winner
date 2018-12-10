<?php

namespace App\Policies;

use App\User;
use App\FamilyMember;
use Illuminate\Auth\Access\HandlesAuthorization;

class FamilyMemberPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the family member.
     *
     * @param  \App\User  $user
     * @param  \App\FamilyMember  $familyMember
     * @return mixed
     */
    public function view(User $user, FamilyMember $familyMember)
    {
        //
    }

    /**
     * Determine whether the user can create family members.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the family member.
     *
     * @param  \App\User  $user
     * @param  \App\FamilyMember  $familyMember
     * @return mixed
     */
    public function update(User $user, FamilyMember $familyMember)
    {
        //
    }

    /**
     * Determine whether the user can delete the family member.
     *
     * @param  \App\User  $user
     * @param  \App\FamilyMember  $familyMember
     * @return mixed
     */
    public function delete(User $user, FamilyMember $familyMember)
    {
        //
    }

    /**
     * Determine whether the user can restore the family member.
     *
     * @param  \App\User  $user
     * @param  \App\FamilyMember  $familyMember
     * @return mixed
     */
    public function restore(User $user, FamilyMember $familyMember)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the family member.
     *
     * @param  \App\User  $user
     * @param  \App\FamilyMember  $familyMember
     * @return mixed
     */
    public function forceDelete(User $user, FamilyMember $familyMember)
    {
        //
    }
}

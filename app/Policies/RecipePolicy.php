<?php

namespace App\Policies;

use App\User;
use App\Recipe;
use Illuminate\Auth\Access\HandlesAuthorization;

class RecipePolicy
{

    use HandlesAuthorization;

    public function update(User $user, Recipe $recipe)
    {
        return $user->person()->getResults()->id === $recipe->person()->getResults()->id;
    }

    public function delete(User $user, Recipe $recipe)
    {
        return $user->person()->getResults()->id === $recipe->person()->getResults()->id;
    }

}

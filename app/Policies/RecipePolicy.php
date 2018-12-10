<?php

namespace App\Policies;

use App\User;
use App\Recipe;
use Illuminate\Auth\Access\HandlesAuthorization;

class RecipePolicy
{

    use HandlesAuthorization;

    /**
     * Determine whether the user can view the recipe.
     *
     * @param  \App\User  $user
     * @param  \App\Recipe  $recipe
     * @return mixed
     */
    public function view(User $user, Recipe $recipe)
    {
        return true;
    }

    /**
     * Determine whether the user can create recipes.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can update the recipe.
     *
     * @param  \App\User  $user
     * @param  \App\Recipe  $recipe
     * @return mixed
     */
    public function update(User $user, Recipe $recipe)
    {
        return $user->person()->getResults()->id === $recipe->person()->getResults()->id;
    }

    /**
     * Determine whether the user can delete the recipe.
     *
     * @param  \App\User  $user
     * @param  \App\Recipe  $recipe
     * @return mixed
     */
    public function delete(User $user, Recipe $recipe)
    {
        return $user->person()->getResults()->id === $recipe->person()->getResults()->id;
    }

    /**
     * Determine whether the user can restore the recipe.
     *
     * @param  \App\User  $user
     * @param  \App\Recipe  $recipe
     * @return mixed
     */
    public function restore(User $user, Recipe $recipe)
    {
        return $user->person()->getResults()->id === $recipe->person()->getResults()->id;
    }

    /**
     * Determine whether the user can permanently delete the recipe.
     *
     * @param  \App\User  $user
     * @param  \App\Recipe  $recipe
     * @return mixed
     */
    public function forceDelete(User $user, Recipe $recipe)
    {
        return $user->person()->getResults()->id === $recipe->person()->getResults()->id;
    }

}

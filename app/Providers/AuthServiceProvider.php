<?php

namespace App\Providers;

use App\Calendar;
use App\FamilyMember;
use App\Policies\CalendarPolicy;
use App\Policies\FamilyMemberPolicy;
use App\Policies\RecipePolicy;
use App\Recipe;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        Calendar::class => CalendarPolicy::class,
        FamilyMember::class => FamilyMemberPolicy::class,
        Recipe::class => RecipePolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // Calendar
        Gate::define('calendar-store', 'App\Policies\CalendarPolicy@store');
        Gate::define('calendar-newRecipe', 'App\Policies\CalendarPolicy@newRecipe');
        Gate::define('calendar-unconfirm', 'App\Policies\CalendarPolicy@unconfirm');

        // FamilyMember
        Gate::define('familyMember-show', 'App\Policies\FamilyMemberPolicy@show');
        Gate::define('familyMember-update', 'App\Policies\FamilyMemberPolicy@update');
        Gate::define('familyMember-delete', 'App\Policies\FamilyMemberPolicy@delete');

        // Recipe
        Gate::define('recipe-update', 'App\Policies\RecipePolicy@update');
        Gate::define('recipe-delete', 'App\Policies\RecipePolicy@delete');
    }
}

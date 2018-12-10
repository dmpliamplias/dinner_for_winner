<?php

namespace App\Providers;

use App\Calendar;
use App\FamilyMember;
use App\Policies\CalendarPolicy;
use App\Policies\FamilyMemberPolicy;
use App\Policies\PersonPolicy;
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

        // Gates
        Gate::define('update-person', 'App\Policies\PersonPolicy@update');
    }
}

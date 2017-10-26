<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define("administrate", function ($user) {
            return $user->is_administrator;
        });

        Gate::define("submit-report", function ($user) {
            return $user->is_verified;
        });

        Gate::define("submit-permit-proposal", function ($user) {
            return $user->is_verified;
        });

        Gate::define("update-account-settings", function ($user) {
            return $user->is_verified;
        });

    }
}

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
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('view-staff', function ($user) {
            return in_array('28', $user->authorization) || $user->role == 1 || in_array('0', $user->authorization);
        });
        Gate::define('edit-staff', function ($user) {
            return in_array('26', $user->authorization) || $user->role == 1 || in_array('0', $user->authorization);
        });
        Gate::define('create-staff', function ($user) {
            return in_array('25', $user->authorization) || $user->role == 1 || in_array('0', $user->authorization);
        });

        Gate::define('view-user', function ($user) {
            return in_array('4', $user->authorization) || $user->role == 1 || in_array('0', $user->authorization);
        });
        Gate::define('edit-user', function ($user) {
            return in_array('2', $user->authorization) || $user->role == 1 || in_array('0', $user->authorization);
        });
        Gate::define('create-user', function ($user) {
            return in_array('1', $user->authorization) || $user->role == 1 || in_array('0', $user->authorization);
        });
    }
}

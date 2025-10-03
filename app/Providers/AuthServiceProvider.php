<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        // Define Gates for admin panel
        Gate::define('access-admin', function ($user) {
            return $user->rol === 'admin' || $user->rol === 'superadmin';
        });

        Gate::define('manage-users', function ($user) {
            return $user->rol === 'superadmin';
        });

        Gate::define('manage-machinery', function ($user) {
            return in_array($user->rol, ['admin', 'superadmin', 'operador']);
        });
    }
}

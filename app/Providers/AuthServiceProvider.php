<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [];

    public function boot(): void
    {
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
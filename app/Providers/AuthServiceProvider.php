<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\Invitation;
use App\Models\User;
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
        Gate::define('act-as-admin', function (User $user) {
            return $user->role == 'ADMIN';
        });

        Gate::define('act-as-customer', function (User $user) {
            return $user->role == 'CUSTOMER';
        });
    }
}

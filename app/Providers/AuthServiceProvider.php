<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
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
        $this->registerPolicies();

        Gate::define('videos_manage_index', function (User $user ) {
            if ($user->isSuperAdmin()) return true;
            return false;
        });

        Gate::define('videos_manage_edit', function (User $user ) {
            if ($user->isSuperAdmin()) return true;
            return false;
        });

        Gate::define('videos_manage_update', function (User $user ) {
            if ($user->isSuperAdmin()) return true;
            return false;
        });

        Gate::define('videos_manage_destroy', function (User $user ) {
            if ($user->isSuperAdmin()) return true;
            return false;
        });

        Gate::define('videos_manage_store', function (User $user ) {
            if ($user->isSuperAdmin()) return true;
            return false;
        });

        Gate::define('users_manage_index', function (User $user ) {
            if ($user->isSuperAdmin()) return true;
            return false;
        });

        Gate::define('users_manage_edit', function (User $user ) {
            if ($user->isSuperAdmin()) return true;
            return false;
        });

        Gate::define('users_manage_update', function (User $user ) {
            if ($user->isSuperAdmin()) return true;
            return false;
        });

        Gate::define('users_manage_destroy', function (User $user ) {
            if ($user->isSuperAdmin()) return true;
            return false;
        });

        Gate::define('users_manage_store', function (User $user ) {
            if ($user->isSuperAdmin()) return true;
            return false;
        });

    }
}

<?php

namespace App\Providers;
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
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // Gate::define('admin', function($user){
        //     return $user;
        // });

        Gate::define('is-admin', fn(User $user) => $user->isAdmin());
        Gate::define('is-sekre', fn(User $user) => $user->isSekre());
        Gate::define('is-jamaah', fn(User $user) => $user->isJamaah());
        Gate::define('is-admin-sekre', fn(User $user) => $user->isAdminSekre());
        // Gate::define('is-admin', function($user){
        //     return $user->isAdmin();
        // });
        // Gate::define('is-sekre', function($user){
        //     return $user->isSekre();
        // });
        // Gate::define('is-jamaah', function($user){
        //     return $user->isJamaah();
        // });

        //
    }
}

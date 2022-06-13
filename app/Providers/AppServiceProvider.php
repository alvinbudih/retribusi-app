<?php

namespace App\Providers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Gate::define("admin", function (User $user) {
            foreach ($user->roles()->get() as $role) {
                if ($role->role_name === "Admin") {
                    return $role->role_name === "Admin";
                }
            }
        });

        Gate::define("kasir", function (User $user) {
            foreach ($user->roles()->get() as $role) {
                if ($role->role_name === "Kasir") {
                    return $role->role_name === "Kasir";
                }
            }
        });

        Gate::define("pelayanan", function (User $user) {
            foreach ($user->roles()->get() as $role) {
                if ($role->role_name === "Pelayanan") {
                    return $role->role_name === "Pelayanan";
                }
            }
        });
    }
}

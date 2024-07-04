<?php

namespace App\Providers;

use App\Models\Field;
use App\Models\User;
use App\Policies\FieldPolicy;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
        Gate::policy(Field::class, FieldPolicy::class);

        // Gate::define('edit-settings', function (User $user) {
        //     return $user->isAdmin
        //         ? Response::allow()
        //         : Response::deny('You must be an administrator.'); //403  unauthorized
        //     // denyAsNotFound();
        //     // Response::denyWithStatus(404); //not found
        // });
        // Gate::define('update-field', function (User $user, Field $field) {
        //     return $user->id === $field->user_id;
        // });
    }
}

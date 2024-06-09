<?php

namespace App\Providers;

use App\Models\Form;
use App\Models\Document_request;
use App\Models\UploadedFiles;
use App\Models\User;
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
        //old
        Gate::define('update-form', function (User $user, Form $form) {
            return $user->id === $form->user_id ||$user->id === 2 ;
        });

        //main user authorization gates
        Gate::define('alter-request', function (User $user, Document_request $requset) {
            return $user->id === $requset->user_id;
        });
        Gate::define('alter-uploadedFiles', function (User $user, UploadedFiles $file) {
            return $user->id === $file->user_id;
        });
    }
}

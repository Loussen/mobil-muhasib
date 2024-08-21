<?php

namespace App\Providers;

use App\Models\Contact;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Spatie\Activitylog\Models\Activity;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
//        $contact = Contact::first();
//        \view()->share('contactInfo',$contact);

//        if (App::environment('production')) {
//            URL::forceScheme('https');
//        }

        $this->app->bind(
            \Backpack\PermissionManager\app\Http\Controllers\UserCrudController::class, //this is package controller
            \App\Http\Controllers\Admin\AdminCrudController::class //this should be your own controller
        );
    }
}

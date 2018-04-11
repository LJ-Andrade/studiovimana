<?php

namespace App\Providers;

use Illuminate\Routing\UrlGenerator;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema; 
use View;
use App\Contact;
use Carbon\Carbon;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        Carbon::setLocale('es');
        $newMessages = Contact::where('status', '=', '0')->get();
        View::share('newMessages', $newMessages);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
    }
}

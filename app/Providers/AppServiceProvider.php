<?php

namespace App\Providers;

use App\Order;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
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
        view()->composer('*',function ($view){
            $userId = Auth::user()->id;

            $data = User::where('id', $userId)->get()->toArray();

            $view->with('data', $data);
        });



    }
}

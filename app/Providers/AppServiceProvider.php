<?php

namespace App\Providers;

use App\Models\Setting;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
         View::composer('*', function ($view) {
            $settingssssss = Setting::first(); 
            $view->with('settingssssss', $settingssssss);
        });
    }
}

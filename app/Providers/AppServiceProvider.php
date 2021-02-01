<?php

namespace App\Providers;

use App\Models\Category;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Jenssegers\Date\Date;

class AppServiceProvider extends ServiceProvider
{
    public function register()
    {
        //
    }

    public function boot()
    {
        $categories = Category::orderBy('id')->get();
        View::share([
            'categories.blade.php' => $categories
        ]);
        Date::setLocale(config('app.locale'));
    }
}

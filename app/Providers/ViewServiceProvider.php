<?php

namespace App\Providers;

use App\Models\Property\PropertyCategory;
use App\View\Composers\LanguageComposer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // $propertyCategories = PropertyCategory::where('status',1)->get();
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // if property_categories table is empty then it will not show any error.
        if (Schema::hasTable('property_categories')) {
            $propertyCategories = PropertyCategory::where('status', 1)->get();
            View::share('propertyCategories', $propertyCategories);
        }
        if (Auth::check()) {
            $user = Auth::user();

            View::share('user', $user);
        } else {
            View::share('user', []);
        }

        View::composer('backend.partials.header', LanguageComposer::class);

    }
}

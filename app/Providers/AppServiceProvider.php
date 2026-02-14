<?php

namespace App\Providers;

use App\Enums\ApprovalStatus;
use App\Models\Advertisement;
use App\Models\Page;
use App\Models\Language;
use App\Models\TimeSlot;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Schema;
use App\Models\coreApp\Setting\Setting;
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
        if (Schema::hasTable('languages')) {

            view()->composer('*', function ($view) {
                $languages = Language::get();
                $language = Language::where('code', Cache::get('locale'))->first();

                $view->with([
                    'languages' => $languages,
                    'language' => $language,
                ]);
            });
        }
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        try {
            DB::connection()->getPdo();
            if (Schema::hasTable('settings')) {
                $settings = Setting::get()->pluck('value', 'name');
                foreach ($settings as $key => $value) {
                    config()->set("settings.app.{$key}", $value);
                }
            }

            //app singleton
            $this->app->singleton('settings', function () {
                return Setting::get()->pluck('value', 'name');
            });


            if (env('APP_HTTPS') == true) {
                URL::forceScheme('https');
            }
        } catch (\Exception $e) {
        }

        View::composer('marsland::includes.footer', function ($view) {
            $page_data = Page::with('children')->select('id', 'title', 'slug', 'serial', 'parent_id', 'show_menu', 'status', 'page_url')
                ->where('status', 1)
                ->whereNull('parent_id')
                ->where('show_menu', 0)
                ->orderBy('serial', 'ASC')
                ->get();
            $view->with(['pages' => $page_data]);
        });


        // Frontend Menus
        View::composer(['frontend.include.header', 'marsland::includes.header'], function ($view) {
            $view->with(['menus' => frontendMenus()]);
        });


        if (Schema::hasTable('time_slots')) {
            View::composer(['frontend.layouts.master'], function ($view) {
                $time_slots = TimeSlot::select('id', 'start_time', 'end_time', 'status')->where('status', 'active')->get();
                $view->with(['time_slots' => $time_slots]);
            });
        }

        Paginator::useBootstrap();
    }
}

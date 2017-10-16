<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\AccountSetting;
use App\Models\GlobalSetting;
use App\Models\Visibility;
use App\Models\User;
use Auth;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('partials.left-nav', function($view){
            $user = User::find(Auth::user()->id);
            $role = $user->role->first();
            $links = $role->main_navigation;
            $view->with('links', $links);
        });

        view()->composer('timeline', function($view){
            $settings = AccountSetting::where('user_id', Auth::user()->id)->first();
            $global = GlobalSetting::first();
            $visibilities = Visibility::all();
            $view->with(compact('visibilities', 'settings', 'global'));
        });

        view()->composer('profile.index', function($view){
            $global = GlobalSetting::first();
            $visibilities = Visibility::all();
            $view->with(compact('visibilities', 'settings', 'global'));
        });

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}

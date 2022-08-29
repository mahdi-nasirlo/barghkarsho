<?php

namespace App\Providers;

use App\Models\Setting;
use App\Models\User;
use Filament\Facades\Filament;
use Illuminate\Support\ServiceProvider;
use Saade\FilamentLaravelLog\Pages\ViewLog;

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
        Filament::serving(function () {
            Filament::registerTheme(mix('css/app.css'));
        });

        // ViewLog::can(function (User $user) {
        //     return $user->role === Role::Admin;
        // });

        $data = Setting::all(['name', 'content'])
            // ->whereIn("name", ['location'])
            ->keyBy("name")
            ->toArray();

        view()->composer('*', function ($view) use ($data) {
            $view->with('information', $data);
        });
    }
}

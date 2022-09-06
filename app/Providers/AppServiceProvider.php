<?php

namespace App\Providers;

use App\Models\Infographic;
use App\Models\Setting;
use App\Models\User;
use Filament\Facades\Filament;
use Illuminate\Support\ServiceProvider;
use Saade\FilamentLaravelLog\Pages\ViewLog;
use Filament\Http\Responses\Auth\Contracts\LoginResponse as LoginResponseContract;
use Illuminate\Support\Facades\Schema;

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
            Filament::registerNavigationGroups([
                'سطوح دسترسی',
                'فروشگاه',
                'بلاگ',
                'خدمات'
            ]);
            Filament::registerStyles([
                asset('css/font.css'),
            ]);
        });

        // ViewLog::can(function (User $user) {
        //     return $user->role === Role::Admin;
        // });

        $this->app->bind("path.public", function () {
            return base_path() . "\public_html";
        });

        $this->app->bind(LoginResponseContract::class, \App\Http\Responses\LoginResponse::class);

        if (Schema::hasTable("infographics")) {
            $data = Infographic::all(['name', 'content'])
                // ->whereIn("name", ['location'])
                ->keyBy("name")
                ->toArray();

            view()->composer('*', function ($view) use ($data) {
                $view->with('information', $data);
            });
        }
    }
}

<?php

namespace App\Providers;

use App\Models\Menu;
use App\Models\Social;
use Filament\Facades\Filament;
use Filament\Navigation\UserMenuItem;
use Illuminate\Database\Eloquent\Model;
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
        if(request()->ip() != '127.0.0.1'){
            $this->app->bind('path.public', function () {
                return base_path().'/../public_html';
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
        Model::unguard();
        view()->composer('partials.navbar', function ($view) {
            $view->with('main_menu', Menu::mainMenu(4));
        });
        view()->composer('partials.header', function ($view) {
            $view->with('socials', Social::where('status', 1)->get());
        });

//        Filament::serving(function () {
//            Filament::registerUserMenuItems([
//                UserMenuItem::make()
//                    ->label('Settings')
//                    ->url(route('filament.pages.settings'))
//                    ->icon('heroicon-s-cog')
//            ]);
//        });
    }
}
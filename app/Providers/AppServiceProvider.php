<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Setting;
use App\User;

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
        Schema::defaultStringLength(191);

        $settings = Setting::all();

        foreach ($settings as $key => $setting) {
            if ($key === 0) {
                $system_name = $setting->value;
            } else if ($key === 1) {
                $favicon = $setting->value;
            } else if ($key === 2) {
                $front_logo = $setting->value;
            } else if ($key === 3) {
                $admin_logo = $setting->value;
            } else if ($key === 4) {
                $facebook = $setting->value;
            } else if ($key === 5) {
                $instagram = $setting->value;
            } else if ($key === 6) {
                $pinterest = $setting->value;
            } else if ($key === 7) {
                $youtube = $setting->value;
            }
        }

        // data sharing to all view
        $shareData = [
            'system_name' => $system_name,
            'favicon' => $favicon,
            'front_logo' => $front_logo,
            'admin_logo' => $admin_logo,
            'facebook' => $facebook,
            'instagram' => $instagram,
            'pinterest' => $pinterest,
            'youtube' => $youtube,
        ];

        view()->share('shareData', $shareData);
    }
}

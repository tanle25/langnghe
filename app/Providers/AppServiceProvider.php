<?php

namespace App\Providers;

use App\Admin\ShopView;
use Illuminate\Support\Facades\Schema;
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
        Schema::defaultStringLength(191);

        // session_start();
        // if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        //     $ip_address = $_SERVER['HTTP_CLIENT_IP'];
        // }
        // //Kiểm tra xem IP có phải là từ Proxy
        // elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        //     $ip_address = $_SERVER['HTTP_X_FORWARDED_FOR'];
        // }
        // //Kiểm tra xem IP có phải là từ Remote Address
        // elseif (!empty($_SERVER['REMOTE_ADDR'])) {
        //     $ip_address = $_SERVER['REMOTE_ADDR'];
        // }
        // if (!isset($_SESSION['ips']) || array_search($ip_address, $_SESSION['ips']) === false) {
        //     if (!isset($_SESSION['ips'])) {
        //         $_SESSION['ips'] = [];
        //     }
        //     $_SESSION['ips'][] = $ip_address;
        //     ShopView::create([
        //         'ip_address' => $ip_address,
        //     ]);
        // }
    }
}

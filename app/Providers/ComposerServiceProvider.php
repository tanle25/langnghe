<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
       @include('ViewComposers/admin.php');
       @include('ViewComposers/product.php');
       @include('ViewComposers/shop.php');
       @include('ViewComposers/thread.php');
       @include('ViewComposers/fe.php');
    }
}

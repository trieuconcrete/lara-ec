<?php
 
namespace App\Providers;
 
use App\View\Composers\CategoryComposer;
use Illuminate\Support\Facades;
use Illuminate\Support\ServiceProvider;
use Illuminate\View\View;
 
class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // ...
    }
 
    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Using class based composers...
        Facades\View::composer([
            'frontend.index',
            'frontend.product_detail',
            'frontend.product_list',
            'frontend.wishlist',
            'frontend.cart',
            'frontend.checkout',
            'frontend.thank-you',
            'auth.login',
            'auth.register'
        ], CategoryComposer::class);
    }
}
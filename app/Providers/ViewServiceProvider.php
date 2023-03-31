<?php
 
namespace App\Providers;
 
use App\View\Composers\CategoryComposer;
use App\View\Composers\NewProductComposer;
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
            'livewire.frontend.home.index',
            'frontend.cart',
            'frontend.checkout',
            'frontend.orders',
            'frontend.thank-you',
            'frontend.profile',
            'auth.login',
            'auth.admin_login',
            'auth.register',
            'admin.dashboard'
        ], CategoryComposer::class);
    }
}
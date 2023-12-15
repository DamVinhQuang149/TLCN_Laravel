<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Protypes;
use App\Models\Products;

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
        //
        View::composer('*', function ($view) {

            $protypes = Protypes::all();
            $min_price = Products::min('discount_price');
            $max_price = Products::max('discount_price');
            //dd($minDiscountPrice);

            // Sử dụng compact để truyền các biến vào view
            $view->with(compact('protypes', 'min_price', 'max_price'));
        });
    }
}
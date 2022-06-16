<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Category;
use View;

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
        try {
            if(\DB::connection()->getPDO()){
                $categories = Category::where('is_featured', 1)->take(10)->get();
                $headerCategories = Category::where('is_header_menu', 1)->take(2)->get();
                View::share([
                    'categories' => $categories,
                    'headerCategories' => $headerCategories
                ]);  
            }
        } catch (\Exception $e) {
            die("Could not connect to the database.  Please check your configuration. error:" . $e );
        }

    }
}

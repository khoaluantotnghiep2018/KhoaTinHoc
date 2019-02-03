<?php

namespace App\Providers; 
    use Illuminate\Support\Facades\Schema;
    use Illuminate\Support\ServiceProvider;
    use DB;

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
        view()->composer('layout.user.index', function($view){
            $tatcatheloai = DB::table('the_loais')->get();
            $loaitin =  DB::table('loai_tins')->get(); 
            $view->with(['tatcatheloai'=>$tatcatheloai, 'loaitin'=>$loaitin]); 
        });
    }
 
}

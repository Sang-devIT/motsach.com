<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;


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
        $pro = DB::table('table_products')->where('table_products.deleted_at','=',null)->select('id','name')->get();
        $catmenu = DB::table('table_categories')->select('id','name')->get();
        $authormenu = DB::table('table_authors')->select('id','name')->get();
        $logo = DB::table('table_banners')->where('type','=','logo')->latest()->paginate(1);
        View::share([
            'pro'=>$pro,'catmenu'=>$catmenu,'authormenu'=>$authormenu,'logo'=>$logo,
        ]);
        Paginator::useBootstrap();
       
    }
}

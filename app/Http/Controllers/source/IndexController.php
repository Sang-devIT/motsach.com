<?php

namespace App\Http\Controllers\source;
use Illuminate\Support\Facades\DB;
use App\Models\TableProduct;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class indexController extends Controller
{
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $product = DB::table('table_products')
        ->join('table_authors','table_products.id_author','=','table_authors.id')
        ->select('table_products.*',DB::raw('table_authors.name as nameAuthor'))
        ->get();
        // dd($product);

        $productnew = DB::table('table_products')
        ->join('table_authors','table_products.id_author','=','table_authors.id')
        ->select('table_products.*',DB::raw('table_authors.name as nameAuthor'))
        ->get();

        $category= DB::table('table_categories')->get();
        $slidemax = DB::table('table_banners')->where('type','=','slide')->get();
        $slidemin = DB::table('table_banners')->where('type','=','slidemin')->get();
        // return session()->all();
        return view('welcome',compact('product','category','slidemax','slidemin'));
        
    }

    
}

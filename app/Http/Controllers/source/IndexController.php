<?php

namespace App\Http\Controllers\source;
use Illuminate\Support\Facades\DB;
use App\Models\TableProduct;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

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
        ->where('deleted_at','=',null)
        ->join('table_authors','table_products.id_author','=','table_authors.id')
        ->select('table_products.*',DB::raw('table_authors.name as nameAuthor'))
        ->get();

        $product1 = DB::table('table_products')
        ->where('deleted_at','=',null)
        ->join('table_authors','table_products.id_author','=','table_authors.id')
        ->select('table_products.*',DB::raw('table_authors.name as nameAuthor'))
        ->latest()->paginate(3);
        



        // dd($product);
        $productnew = DB::table('table_products')
        ->where('deleted_at','=',null)
        ->join('table_authors','table_products.id_author','=','table_authors.id')
        ->select('table_products.*',DB::raw('table_authors.name as nameAuthor'))->orderBy('id', 'desc')->first();
      

        $category= DB::table('table_categories')->get();
        $slidemax = DB::table('table_banners')->where('type','=','slide')->latest()->paginate(2);
        $slidemin = DB::table('table_banners')->where('type','=','slidemin')->get();
        // return session()->all();
        return view('welcome',compact('product','product1','category','slidemax','slidemin','productnew'));
        
    }

    
}

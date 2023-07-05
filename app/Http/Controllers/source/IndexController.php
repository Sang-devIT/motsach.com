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
        // dd($product);
        $productnew = DB::table('table_products')
        ->where('deleted_at','=',null)
        ->join('table_authors','table_products.id_author','=','table_authors.id')
        ->select('table_products.*',DB::raw('table_authors.name as nameAuthor'))
        ->get();

        $category= DB::table('table_categories')->get();


        return view('welcome',compact('product','category'));
        
    }
}

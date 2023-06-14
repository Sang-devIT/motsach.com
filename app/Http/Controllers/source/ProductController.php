<?php

namespace App\Http\Controllers\source;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TableProduct;
use App\Models\TableCategory;


use Illuminate\Support\Facades\DB;
class ProductController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = DB::table('table_products')
        ->join('table_categories','table_products.id_category','=','table_categories.id')
        ->join('table_produces','table_products.id_produce','=','table_produces.id')
        ->join('table_authors','table_products.id_author','=','table_authors.id')
        ->select('table_products.*',DB::raw('table_categories.name as nameCategory,table_produces.name as nameProduce,table_authors.name as nameAuthor'))
        ->latest()->paginate(15);
        $category = TableCategory::latest()->paginate(15);
        return view('layouts.product.product',compact('product','category'));
    }
    public function show($id)
    {
        $contact = DB::table('table_products')->where('slug',$id)->get();
        $category=DB::table('table_categories')->select('name')->where('id',$contact[0]->id_category)->first();
        $produce=DB::table('table_produces')->select('name')->where('id',$contact[0]->id_produce)->first();
        $author=DB::table('table_authors')->select('name')->where('id',$contact[0]->id_author)->first();
        return view('layouts.product.product_detail',compact('id','contact','category','produce','author'));
    }
    public function showcategory($id)
    {
      
     if(TableCategory::where('id',$id)->exists())
     {
        $cate = TableCategory::where('id', $id)->first();
        $product = TableProduct::where('id_category',$cate->id)->where('status','1')->get();
        $category = TableCategory::latest()->paginate(15);
        return view('layouts.product.product',compact('id','product','category'));
     }
     else
     {
        return redirect('/') ->with('status',"Loại Sản không đúng");
     }
       
    }
}

<?php

namespace App\Http\Controllers\source;

use App\Http\Controllers\Controller;
use App\Models\TableAuthor;
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
        ->where('deleted_at','=',null)
        ->join('table_categories','table_products.id_category','=','table_categories.id')
        ->join('table_produces','table_products.id_produce','=','table_produces.id')
        ->join('table_authors','table_products.id_author','=','table_authors.id')
        ->select('table_products.*',DB::raw('table_categories.name as nameCategory,table_produces.name as nameProduce,table_authors.name as nameAuthor'))
        ->latest()->paginate(8);
      
        
        
        $category= DB::table('table_categories')->get();
        foreach($category as $item){       
            $item->count= DB::table('table_products')
            ->addSelect(DB::raw('count(table_products.id_category) as count'))
            ->where('table_products.deleted_at','=',null)
            ->where('table_products.id_category',$item->id)
            ->groupBy('table_products.id_category')->get()->implode('count', ', ');
        }
        $author= DB::table('table_authors')->get();
        foreach($author as $item){       
            $item->count= DB::table('table_products')
            ->addSelect(DB::raw('count(table_products.id_author) as count'))
            ->where('table_products.deleted_at','=',null)
            ->where('table_products.id_author',$item->id)
            ->groupBy('table_products.id_author')->get()->implode('count', ', ');
        }
        return view('layouts.product.product',compact('product','category','author',));
    }
    public function show($id)
    {
        $contact = DB::table('table_products')->where('deleted_at','=',null)->where('slug',$id)->get();

        $category=DB::table('table_categories')->select('name','id')->where('id',$contact[0]->id_category)->first();
        $produce=DB::table('table_produces')->select('name','id')->where('id',$contact[0]->id_produce)->first();
        $author=DB::table('table_authors')->select('name','id')->where('id',$contact[0]->id_author)->first();

        $gallery=DB::table('table_galeries')->select('thumbnail')->where('product_id',$contact[0]->id)->get();
        
        $categorydetail= DB::table('table_categories')->get();
        foreach($categorydetail as $item){       
            $item->count= DB::table('table_products')
            ->addSelect(DB::raw('count(table_products.id_category) as count'))
            ->where('table_products.deleted_at','=',null)
            ->where('table_products.id_category',$item->id)
            ->groupBy('table_products.id_category')->get()->implode('count', ', ');
        }



        $authordetail= DB::table('table_authors')->get();
        foreach($authordetail as $item){       
            $item->count= DB::table('table_products')
            ->addSelect(DB::raw('count(table_products.id_author) as count'))
            ->where('table_products.deleted_at','=',null)
            ->where('table_products.id_author',$item->id)
            ->groupBy('table_products.id_author')->get()->implode('count', ', ');
        }


 
        return view('layouts.product.product_detail',compact('id','contact','category','produce','author','categorydetail','authordetail','gallery'));

    }
    public function showcategory($id)
    { 
     if(TableCategory::where('id',$id)->exists())
     {
        $cate = TableCategory::where('id', $id)->get()->first();
        $product = TableProduct::where('id_category',$cate->id)->where('table_products.deleted_at','=',null)->where('status','1')->get();
        $category = TableCategory::latest()->paginate(15);
    
        $category= DB::table('table_categories')->get();
        foreach($category as $item){       
            $item->count= DB::table('table_products')
            ->addSelect(DB::raw('count(table_products.id_category) as count'))
            ->where('table_products.deleted_at','=',null)
            ->where('table_products.id_category',$item->id)
            ->groupBy('table_products.id_category')->get()->implode('count', ', ');
        }

        // $authors = TableAuthor::where('id', $id)->first();
        // $product = TableProduct::where('id_author',$authors->id)->where('table_products.deleted_at','=',null)->where('status','1')->get();
        // dd($product);
        // $author = TableAuthor::latest()->paginate(15);

        $author= DB::table('table_authors')->get();
        foreach($author as $item){       
            $item->count= DB::table('table_products')
            ->addSelect(DB::raw('count(table_products.id_author) as count'))
            ->where('table_products.deleted_at','=',null)
            ->where('table_products.id_author',$item->id)
            ->groupBy('table_products.id_author')->get()->implode('count', ', ');
        }


       
        return view('layouts.product.category',compact('id','product','category','cate','author'));
     }
     else
     {
        return redirect('/') ->with('status',"Loại Sản phẩm không đúng");
     }
       
    }


    public function showauthor($id)
    { 
     if(TableAuthor::where('id',$id)->exists())
     {
        // $cate = TableCategory::where('id', $id)->get()->first();
        // $product = TableProduct::where('id_category',$cate->id)->where('table_products.deleted_at','=',null)->where('status','1')->get();
        // $category = TableCategory::latest()->paginate(15);
        
        $category= DB::table('table_categories')->get();
        foreach($category as $item){       
            $item->count= DB::table('table_products')
            ->addSelect(DB::raw('count(table_products.id_category) as count'))
            ->where('table_products.deleted_at','=',null)
            ->where('table_products.id_category',$item->id)
            ->groupBy('table_products.id_category')->get()->implode('count', ', ');
        }

        $authors = TableAuthor::where('id', $id)->first();
        $product = TableProduct::where('id_author',$authors->id)->where('table_products.deleted_at','=',null)->where('status','1')->get();
        $author = TableAuthor::latest()->paginate(15);

        $author= DB::table('table_authors')->get();
        foreach($author as $item){       
            $item->count= DB::table('table_products')
            ->addSelect(DB::raw('count(table_products.id_author) as count'))
            ->where('table_products.deleted_at','=',null)
            ->where('table_products.id_author',$item->id)
            ->groupBy('table_products.id_author')->get()->implode('count', ', ');
        }

        return view('layouts.product.author',compact('id','product','author','category'));
     }
     else
     {
        return redirect('/') ->with('status',"Tác giả không đúng");
     }
       
    }
    public function Search(Request $request){

        if($request->search){

            $searchpro = TableProduct::where('name','LIKE','%'.$request->search.'%')->where('table_products.deleted_at','=',null)->get();
          
            return view('layouts.product.searchpro',compact('searchpro'));
        }else{
            return redirect()->back()->with('message','Không tìm thấy');
        }
    }
 
    
}

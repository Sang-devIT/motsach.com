<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TableProduct;
use App\Models\TableGalery;
use App\Models\TableProductImportDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use PhpParser\Node\Stmt\Foreach_;
use Validator;
use Carbon\Carbon;


class ProductsController extends Controller
{

   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pro = DB::table('table_products')
        ->where('deleted_at','=',null)
        ->join('table_categories','table_products.id_category','=','table_categories.id')
        ->join('table_produces','table_products.id_produce','=','table_produces.id')
        ->join('table_authors','table_products.id_author','=','table_authors.id')
        ->select('table_products.*',DB::raw('table_categories.name as nameCategory,table_produces.name as nameProduce,table_authors.name as nameAuthor'))
        ->latest()->paginate(15);
        return view('admin.Product.index',compact('pro'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = DB::table('table_categories')->select('id','name')->get();
        $produce = DB::table('table_produces')->select('id','name')->get();
        $author = DB::table('table_authors')->select('id','name')->get();
        return view('admin.Product.add',compact('category','produce','author'));
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $getSlug = DB::table('table_products')->select('slug')->get();

        $request->validate([
            'name'=>'required',
            'regular_price'=>'required'
            ],
            [
                'name.required'=>'Tên không được trống',
                'regular_price.required'=>'Giá không được trống',
            ]
        );
        $getImages = '';
            if($request->hasFile('photo')){
                //Hàm kiểm tra dữ liệu
                
                $this->validate($request, 
                    [
                        'photo' => 'mimes:jpg,jpeg,png,gif|max:2048',
                    ],			
                    [
                        'photo.mimes' => 'Chỉ chấp nhận hình thẻ với đuôi .jpg .jpeg .png .gif',
                        'photo.max' => 'Hình thẻ giới hạn dung lượng không quá 2M',
                    ]
                );
                
                //Lưu hình ảnh vào thư mục public/upload/photo
                $anh = $request->file('photo');
                $getImages = time().'-'.$anh->getClientOriginalName();
                $destinationPath = public_path('assets/images/upload/product');
                $anh->move($destinationPath, $getImages);
            }
        $input = $request->all();
        $input['photo'] = $getImages;
        $input['slug'] = Str::slug($request->name,'-');
        $input['code'] = 'SP-'.Str::upper(Str::random(5));
        TableProduct::create($input);

        $slug1 = Str::slug($request->name,'-');
        $id_pro = DB::table('table_products')->where('deleted_at','=',null)->where('slug',$slug1)->get()->first();
    
        if ($request->hasFile('gallery')) {
          
            $gallerys = $request->gallery;
            $galleryTypeAllows = ['jpg', 'jpeg', 'png', 'webp', 'gif'];
            foreach ($gallerys as $k =>  $gallery) {
                $galleryName = time() . $k . "." . $gallery->extension();
                $galleryType = $gallery->getClientOriginalExtension();
                $gallerySize = $gallery->getSize();

                if (in_array(strtolower($galleryType), $galleryTypeAllows) && $gallerySize <= 26214400) {
                    TableGalery::create(
                        [
                            'thumbnail' => $galleryName,
                            'product_id' => $id_pro->id
                            // "type" => $request->type_hidden,
                            // "status" => 'active',
                        ]
                    );
                    $gallery->move('assets/images/upload/product', $galleryName);
                } else {
                    return redirect()->route('admin.product')->with('danger', 'Album ảnh tải lên chưa đúng định dạng hoặc vượt quá 25MB');
                }
            }
        }

        return redirect()->route('admin.product')->with('flash_message','Thêm thành công !!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contact = DB::table('table_products')->where('deleted_at','=',null)->where('slug',$id)->get();
        
        $category=DB::table('table_categories')->select('name')->where('id',$contact[0]->id_category)->first();
        $produce=DB::table('table_produces')->select('name')->where('id',$contact[0]->id_produce)->first();
        $author=DB::table('table_authors')->select('name')->where('id',$contact[0]->id_author)->first();
        $gallery=DB::table('table_galeries')->select('thumbnail')->where('product_id',$contact[0]->id)->get();
     
        return view('admin.product.show',compact('id','contact','category','produce','author','gallery'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contact = DB::table('table_products')->where('slug',$id)
        ->where('table_products.deleted_at','=',null)
        ->join('table_categories','table_products.id_category','=','table_categories.id')
        ->join('table_produces','table_products.id_produce','=','table_produces.id')
        ->join('table_authors','table_products.id_author','=','table_authors.id')
        ->select('table_products.*',DB::raw('table_categories.name as nameCategory,table_produces.name as nameProduce,table_authors.name as nameAuthor,table_categories.id as idCategory,table_produces.id as idProduce,table_authors.id as idAuthor'))
        ->get();
        $category = DB::table('table_categories')->select('id','name')->get();
        $produce = DB::table('table_produces')->select('id','name')->get();
        $author = DB::table('table_authors')->select('id','name')->get();
        $gallery=DB::table('table_galeries')->select('thumbnail')->where('product_id',$contact[0]->id)->get();
        return view('admin.product.edit',compact('id','contact','category','produce','author','gallery'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $contact = TableProduct::where('slug',$id)->where('table_products.deleted_at','=',null)->first();
        // if ($contact->name == $request->name) {
            if($request->file('photo') != null){
                $this->validate($request, 
                    [
                        'photo' => 'mimes:jpg,jpeg,png,gif|max:2048',
                    ],			
                    [
                        'photo.mimes' => 'Chỉ chấp nhận hình thẻ với đuôi .jpg .jpeg .png .gif',
                        'photo.max' => 'Hình thẻ giới hạn dung lượng không quá 2M',
                    ]
                );
                $getImages = DB::table('table_products')->select('photo')->where('slug',$id)->get();
                if($getImages[0]->photo != '' && file_exists(public_path('assets/images/upload/product/'.$getImages[0]->photo)))
                {  
                    unlink(public_path('assets/images/upload/product/'.$getImages[0]->photo));
                }
                
                $anh = $request->file('photo');
                $getImages = time().'-'.$anh->getClientOriginalName();
                $destinationPath = public_path('assets/images/upload/product');
                $anh->move($destinationPath, $getImages);
                $contact->photo = $getImages;
            }

            
            if ($request->file('gallery')!= null) {
           
                $gallerys = $request->gallery;
               
                $galleryTypeAllows = ['jpg', 'jpeg', 'png', 'webp', 'gif'];
                $getImages1 = DB::table('table_galeries')->select('thumbnail')->where('product_id',   $contact->id)->get();
                // dd($getImages1);
                foreach($getImages1 as $item){

                    // return $item->thumbnail;
                    unlink(public_path('assets/images/upload/product/'.$item->thumbnail));
                
                }
                DB::table('table_galeries')->where('product_id',$contact->id)->delete();
                foreach ($gallerys as $k =>  $gallery) {
                    
                    $galleryName = time() . $k . "." . $gallery->extension();
                    $galleryType = $gallery->getClientOriginalExtension();
                    $gallerySize = $gallery->getSize();
                   
                    if (in_array(strtolower($galleryType), $galleryTypeAllows) && $gallerySize <= 26214400) {
                        TableGalery::create(
                            [
                                'thumbnail' => $galleryName,
                                'product_id' => $contact->id
                                // "type" => $request->type_hidden,
                                // "status" => 'active',
                            ]
                        );

                       
                        $gallery->move('assets/images/upload/product', $galleryName);
                    } else {
                        return redirect()->route('admin.product')->with('danger', 'Album ảnh tải lên chưa đúng định dạng hoặc vượt quá 25MB');
                    }
                }
            }

            $contact->id_category = $request->id_category;
            $contact->name = $request->name;
            $contact->slug = Str::slug($request->name,'-');
            $contact->id_produce = $request->id_produce;
            $contact->id_author = $request->id_author;
            $contact->regular_price = $request->regular_price;
            $contact->desc = $request->desc;
            $contact->content = $request->content;
            $contact->status = $request->status;
            $contact->update();
            return redirect()->route('admin.product')->with('flash_message','Cập nhật thành công !!!');
        // }else{
        //     $validator = Validator::make(
        //         $request->all(),
        //         [
        //             'name'=>'required',
        //             'regular_price'=>'required'
        //         ],
        //         [
        //             'name.required'=>'Tên không được trống',
        //             'regular_price.required'=>'Giá không được trống',
        //         ]
        //     );
        //     if ($validator->fails()) {
        //         $nameloi=$request->name;
        //         $loi="tên bị trùng";
        //         $contact = DB::table('table_products')->where('slug',$id)
        //         ->join('table_categories','table_products.id_category','=','table_categories.id')
        //         ->join('table_produces','table_products.id_produce','=','table_produces.id')
        //         ->join('table_authors','table_products.id_author','=','table_authors.id')
        //         ->select('table_products.*',DB::raw('table_categories.name as nameCategory,table_produces.name as nameProduce,table_authors.name as nameAuthor,table_categories.id as idCategory,table_produces.id as idProduce,table_authors.id as idAuthor'))
        //         ->get();
        //         $category = DB::table('table_categories')->select('id','name')->get();
        //         $produce = DB::table('table_produces')->select('id','name')->get();
        //         $author = DB::table('table_authors')->select('id','name')->get();
        //         return view('admin.product.edit',compact('id','contact','category','produce','author','loi','nameloi'));
        //     } else {
        //         if($request->file('photo') != null){
        //             $this->validate($request, 
        //                 [
        //                     'photo' => 'mimes:jpg,jpeg,png,gif|max:2048',
        //                 ],			
        //                 [
        //                     'photo.mimes' => 'Chỉ chấp nhận hình thẻ với đuôi .jpg .jpeg .png .gif',
        //                     'photo.max' => 'Hình thẻ giới hạn dung lượng không quá 2M',
        //                 ]
        //             );
        //             $getImages = DB::table('table_products')->select('photo')->where('slug',$id)->get();
        //             if($getImages[0]->photo != '' && file_exists(public_path('assets/images/upload/product/'.$getImages[0]->photo)))
        //             {  
        //                 unlink(public_path('assets/images/upload/product/'.$getImages[0]->photo));
        //             }
        //             $anh = $request->file('photo');
        //             $getImages = time().'-'.$anh->getClientOriginalName();
        //             $destinationPath = public_path('assets/images/upload/product');
        //             $anh->move($destinationPath, $getImages);
        //             $contact->photo = $getImages;
        //         }
        //         $contact->name = $request->name;
        //         $contact->id_category = $request->id_category;
        //         $contact->id_produce = $request->id_produce;
        //         $contact->id_author = $request->id_author;
        //         $contact->regular_price = $request->regular_price;
        //         $contact->desc = $request->desc;
        //         $contact->content = $request->content;
        //         $contact->status = $request->status;
        //         $contact['slug'] = Str::slug($request->name,'-');
        //         $contact->update();
        //         return redirect()->route('admin.product')->with('flash_message','Cập nhật thành công !!!');
        //         }
        // }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contact = TableProduct::where('slug',$id)->where('table_products.deleted_at','=',null)->first();
        if(!empty($contact['photo'])){
            $destinationPath = public_path('assets/images/upload/product/'.$contact['photo']);
            if(file_exists($destinationPath)){
                unlink(public_path('assets/images/upload/product/'.$contact['photo']));
            }
        }
        
        $contact->delete();
        return redirect()->route('admin.product')->with('flash_message1', 'Xóa thành công !!!');
    }
}

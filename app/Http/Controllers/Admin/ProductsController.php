<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TableProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
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
            'name'=>'required|unique:table_products,name',
            'code'=>'required|unique:table_products,code',
            'regular_price'=>'required'
            ],
            [
                'name.required'=>'Tên không được trống',
                'code.required'=>'Mã sản phẩm không được trống',
                'regular_price.required'=>'Giá không được trống',
                'name.unique'=>'Tên không được trùng',
                'code.unique'=>'Mã sản phẩm không được trùng',
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
        TableProduct::create($input);
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
        $contact = DB::table('table_products')->where('slug',$id)->get();
        $category=DB::table('table_categories')->select('name')->where('id',$contact[0]->id_category)->first();
        $produce=DB::table('table_produces')->select('name')->where('id',$contact[0]->id_produce)->first();
        $author=DB::table('table_authors')->select('name')->where('id',$contact[0]->id_author)->first();
        return view('admin.product.show',compact('id','contact','category','produce','author'));
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
        ->join('table_categories','table_products.id_category','=','table_categories.id')
        ->join('table_produces','table_products.id_produce','=','table_produces.id')
        ->join('table_authors','table_products.id_author','=','table_authors.id')
        ->select('table_products.*',DB::raw('table_categories.name as nameCategory,table_produces.name as nameProduce,table_authors.name as nameAuthor,table_categories.id as idCategory,table_produces.id as idProduce,table_authors.id as idAuthor'))
        ->get();
        $category = DB::table('table_categories')->select('id','name')->get();
        $produce = DB::table('table_produces')->select('id','name')->get();
        $author = DB::table('table_authors')->select('id','name')->get();
        return view('admin.product.edit',compact('id','contact','category','produce','author'));
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
        // $pro = DB::table('table_products')->where('slug',$id)->get();
        $pro = TableProduct::where('slug',$id)->first();
        $request->validate([
            'name'=>'required|unique:table_products,name',
            'code'=>'required|unique:table_products,code',
            'regular_price'=>'required'
            ],
            [
                'name.required'=>'Tên không được trống',
                'code.required'=>'Mã sản phẩm không được trống',
                'regular_price.required'=>'Giá không được trống',
                'name.unique'=>'Tên không được trùng',
                'code.unique'=>'Mã sản phẩm không được trùng',
            ]
        );
        // dd($contact);
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
            $pro->photo = $getImages;
        }
        $pro->name = $request->name;
        $pro->id_category = $request->id_category;
        $pro->id_produce = $request->id_produce;
        $pro->id_author = $request->id_author;
        $pro->regular_price = $request->regular_price;
        $pro->desc = $request->desc;
        $pro->content = $request->content;
        $pro->status = $request->status;
        $pro['slug'] = Str::slug($request->name,'-');
        $pro->update();
        return redirect()->route('admin.product')->with('flash_message','Cập nhật thành công !!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contact = TableProduct::where('slug',$id)->first();
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

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TableProduct;
use App\Models\TableProductImport;
use App\Models\TableProductImportDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ProductImportsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cthdnhap = DB::table('table_product_import_details')
        ->join('table_products','table_product_import_details.id_product','=','table_products.id')
        ->join('table_product_imports','table_product_import_details.id_product_import','=','table_product_imports.id')
        ->select('table_product_import_details.*',DB::raw('table_products.name as nameProduct,table_product_imports.import_code as codeProductImport,table_product_imports.import_date as dateProductImport,table_product_imports.total_money as totalProductImport'))
        ->latest()->paginate(15);
        return view('admin.ProductImport.index',compact('cthdnhap'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pro = DB::table('table_products')->select('id','name')->get();
        $proImport = DB::table('table_product_imports')->select('id','import_date')->get();
        return view('admin.productimport.add',compact('pro','proImport'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'quantity'=>'required',
            'price'=>'required'
            ]
        );
        $import = new TableProductImport();
        $count =  DB::table('table_product_imports')->count() + 1;
        $import->import_code =  'HD' . Date('Ymd') .  $count;
        $import->import_date = Carbon::now('Asia/Ho_Chi_Minh');
        $import->total_money = $request->quantity * $request->price;
        $import->save();
        
        $importDetail = new TableProductImportDetail();
        $importDetail->id_product_import =  $import->id;
        $importDetail->id_product = $request->id_product;
        $importDetail->quantity = $request->quantity;
        $importDetail->price = $request->price;
        $importDetail->save();

        $data = DB::table('table_product_import_details')
        ->where('id',$importDetail->id)
        ->get();
        foreach($data as $item){
            $stock = DB::table('table_products')
                ->where('id', $item->id_product)
                ->select('stock')->get();
            DB::table('table_products')
                ->where('id', $item->id_product)
                ->update([
                    'stock' => $stock[0]->stock + $item->quantity
                ]);
        }
        return redirect()->route('admin.productimport')->with('flash_message','Thêm thành công !!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contact = DB::table('table_product_import_details')->where('id',$id)->get();
        $product=DB::table('table_products')->select('name')->where('id',$contact[0]->id_product)->first();
        $productImport=DB::table('table_product_imports')->select('import_code','import_date','total_money')->where('id',$contact[0]->id_product_import)->first();
        return view('admin.productimport.show',compact('id','contact','product','productImport'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

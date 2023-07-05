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
        $hdnhap = DB::table('table_product_imports')->latest()->paginate(15);
        return view('admin.ProductImport.index',compact('hdnhap'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $pro = DB::table('table_products')->select('id','name')->get();
        // $proImport = DB::table('table_product_imports')->select('id','import_date')->get();
        return view('admin.productimport.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        //dd($request->data['id_product']);
        $import = new TableProductImport();
        $count =  DB::table('table_product_imports')->count() + 1;
        $import->import_code =  'HD' . Date('Ymd') .  $count;
        $import->import_date = Carbon::now('Asia/Ho_Chi_Minh');
        $import->save();
        $total = 0;
        foreach( $request->data['id_product'] as $k=>$v){
            $importDetail = new TableProductImportDetail();
            $importDetail->id_product_import =  $import->id;
            $importDetail->id_product = $v;
            $importDetail->quantity = $request->data['quantity'][$k];
            $importDetail->price = $request->data['price'][$k];
            $importDetail->save();
            $data = DB::table('table_product_import_details')
            ->where('id',$importDetail->id)
            ->get();
            foreach($data as $item){
                $stock = DB::table('table_products')
                ->where('table_products.deleted_at','=',null)
                    ->where('id', $item->id_product)
                    ->select('stock')->get();
                DB::table('table_products')
                    ->where('id', $item->id_product)
                    ->update([
                        'stock' => $stock[0]->stock + $item->quantity
                    ]);
            }
            $total += $request->data['quantity'][$k] * $request->data['price'][$k];
        }
        DB::table('table_product_imports')
                    ->where('id', $import->id)
                    ->update([
                        'total_money' => $total,
                    ]);
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
        
        $cthdnhap = DB::table('table_product_import_details')
        ->where('id_product_import',$id)
        ->join('table_products','table_product_import_details.id_product','=','table_products.id')
        ->join('table_product_imports','table_product_import_details.id_product_import','=','table_product_imports.id')
        ->select('table_product_import_details.*',DB::raw('table_products.name as nameProduct,table_product_imports.import_code as codeProductImport,table_product_imports.import_date as dateProductImport,table_product_imports.total_money as totalProductImport'))
        ->get();
        // dd($cthdnhap);
        return view('admin.productimport.show',compact('id','cthdnhap'));
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

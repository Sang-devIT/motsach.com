<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\TableOrder;
use App\Models\TableOrdersDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrdersController extends Controller
{
    public function index(){
        $order = DB::table('table_orders')->latest()->paginate(15);
        return view('admin.Order.index',compact('order'));
    }
    public function show($id){
        $order = DB::table('table_orders')->where('id',$id)->first();
        $orderDetail=DB::table('table_orders_details')
        ->where('table_orders_details.id_orders',$order->id)
        ->join('table_products','table_products.id','=','table_orders_details.id_product')
        ->join('table_orders','table_orders.id','=','table_orders_details.id_orders')
        ->select('table_orders_details.*',DB::raw('table_products.photo as photoPro,table_products.name as namePro,table_orders.total_money as total'))
        ->get();
        return view('admin.Order.show',compact('order','orderDetail','id'));
    }
    public function update(Request $request, $id){
        $order = TableOrder::find($id);
        $input = $request->all();
        $trangthai = $request->status;
        if($trangthai==4){
            $orderDetail = DB::table('table_orders_details')
            ->where('table_orders_details.id_orders',$order->id)
            ->get();
            // dd($orderDetail);
            foreach($orderDetail as $k => $v){
                $stock = DB::table('table_products')
                ->where('id', $v->id_product)
                ->select('stock')->get();
                DB::table('table_products')
                    ->where('id', $v->id_product)
                    ->update([
                        'stock' => $stock[0]->stock + $v->quantity
                    ]);
            }
        }
        $order->update($input);
        return redirect()->route('admin.order');
    }
    public function destroy($id){
        $deleteOder = TableOrder::find($id)->delete();
        return redirect()->route('admin.order');
    }
}

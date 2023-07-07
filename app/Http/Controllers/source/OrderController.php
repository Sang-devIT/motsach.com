<?php

namespace App\Http\Controllers\source;

use App\Http\Controllers\Controller;
use App\Models\TableProduct;
use App\Models\TableOrder;
use App\Models\TableOrdersDetail;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;
use Ramsey\Uuid\Type\Integer;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
class OrderController extends Controller
{
    public function index()
    {
        $orders = Cart::content();
        return view('layouts.order.cart',compact('orders'));    
    }
    
    public function addToCart(Request $request)
    {
        
        $qty = $request->input('qty');
        $id = $request->input('id');
        $product = TableProduct::find($id); 
        Cart::add(
            [
                'id' => $product->id,
                'name' => $product->name, 
                'qty' => $qty, 
                'price' => $product->regular_price, 
                'options' => ['photo' => $product->photo]
            ]
        );
    }
    public function addToCart1($id)
    {
        $product = TableProduct::find($id);
        Cart::add([
                'id' => $product->id,
                'name' => $product->name, 
                'qty' => 1, 
                'price' => $product->regular_price, 
                'options' => ['photo' => $product->photo,'stock'=>$product->stock]
            ]
        );
        return redirect('/cart');
    }
    public function update(Request $request)
    {
        $dataCarts = $request->input('qty');
        foreach ($dataCarts as $rowId => $qty) {
            Cart::update($rowId, $qty);
        }
        return redirect("/cart");
    }
    public function updateAjax(Request $request){ 
        $qty =  $request->get('qty');
        $price = $request->get('price');
        $rowId = $request->get('rowid');

        $subtotal = $price*$qty ;
        Cart::update($rowId, $qty);
        $data = array(
            'subtotal' => number_format($subtotal, 0, ",", ".") . "VNĐ",
            'total' => number_format(Cart::total(), 0, ",", ".") . "VNĐ",
        );
        echo  json_encode($data);
    }
    public function destroy()
    {
        Cart::destroy();
        return redirect("/cart");
    }
    public function remove($rowId)
    {
        //return $rowId;
        if ($rowId) {
            Cart::remove($rowId);
        }
        return redirect("/cart");
    }
    public function checkout()
    {
        $orders = Cart::content();
        return view('layouts.order.checkout',compact('orders'));    
    }
    public function checkoutStore(Request $request)
    {

        $cart = Cart::content();
        if(empty($cart))
        {
            $orders = Cart::content();
            return redirect()->route('order.checkout')->with('flash_message','Vui lòng thêm sản phẩm vào giỏ hàng!!!');
        }
        $order_date = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
        $count =  DB::table('table_product_imports')->count() + 1;
        $order_code =  'HD' . Date('Ymd') .  $count;
        $id_user = Auth::user()->id;
        // dd($id_user);
        //dd($request->get('httt_ma'));
        $order = TableOrder::create([
            'id_user'=> $id_user,   
            'order_date'=>$order_date,
            'total_money'=>Cart::total(),
            'fullname'=>$request->fullname,
            'phone'=>$request->phone,
            'email'=>$request->email,
            'address'=>$request->address,
            'order_payment'=>$request->get('httt_ma'),
            'requirements'=>$request->requirements,
            'status'=>1,
            'order_code'=>$order_code
        ]);
        foreach($cart as $k => $v){
            $order_details =  TableOrdersDetail::create([
                'id_orders'=>$order->id,
                'id_product'=>$v->id,
                'price'=>$v->price,
                'total_money'=>$v->total,
                'quantity'=>$v->qty
            ]);
            $stock = DB::table('table_products')
            ->where('id', $v->id)
            ->select('stock')->get();
            DB::table('table_products')
                ->where('id', $v->id)
                ->update([
                    'stock' => $stock[0]->stock - $v->qty
                ]);
        }
        Cart::destroy();
        return redirect("/cart")->with('success','Thanh toán thành công!') ;
    }
}

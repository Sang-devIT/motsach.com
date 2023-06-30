<?php

namespace App\Http\Controllers\source;

use App\Http\Controllers\Controller;
use App\Models\TableProduct;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use Ramsey\Uuid\Type\Integer;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Cart::content();
        return view('layouts.order.cart',compact('orders'));    
    }
    
    public function addToCart($id)
    {
        $product = TableProduct::find($id);
        Cart::add(
            [
                'id' => $product->id,
                'name' => $product->name, 
                'qty' => 1, 
                'price' => $product->regular_price, 
                'options' => ['photo' => $product->photo]
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
}

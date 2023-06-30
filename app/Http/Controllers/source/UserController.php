<?php

namespace App\Http\Controllers\source;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
class UserController extends Controller
{
    public function orderManagement(){
        $carts = Session::get('carts');
        $countCart=0;
        if(!empty($carts)){
            foreach($carts as $item){
                $countCart++;
            }
        }
        $countOrder = DB::table('invoices')
        ->whereBetween('status',[0,2])
        ->where('userID',Session::get('customers')->id)
        ->count();
       
        // $monthNow = Date('m');
        // $dateNow = Date('d');
        // $countInvoice = DB::table('invoices')
        // ->where('userID',Session::get('customers')->id)
        // ->whereBetween('status',[0,2])
        // ->whereMonth('dateCreated','=' ,1)
        // ->whereDate('dateCreated','<' , $dateNow)
        // ->count();
        // ->get();
        // dd($countInvoice);
         $getInvoice = DB::table('invoices')
        ->where('userID',Session::get('customers')->id)
        ->whereBetween('status',[0,2])
        ->orderBy('dateCreated','desc')
        ->select('invoices.*')
        ->addSelect(DB::raw("null as products"))->get();
        foreach($getInvoice as $item){
            $item->products = DB::table('invoice_details')
            ->join('products','invoice_details.productID','products.id')
            ->where('invoice_details.invoiceID',$item->id)
            ->select('products.*','invoice_details.quantity')->get();
        } 
        return view('user.profile.order_manage',[
            'count' =>$countCart,
            'countOrder' =>  $countOrder,
            'invoices'=>$getInvoice,
        ]);
    }


    public function accountManagement(){
        return view('layouts.user.profile');
    }
    public function editUser(Request $request){
     
            DB::table('table_users')
            ->where('id',Session::get('customers')->id)
            ->update(
                [
                    'fullname' => $request->fullname,
                    'phone' =>$request->phone,
                    'address' =>$request->address,
                ]
            );
        
        Session::forget('customers');
        $newUser = DB::table('table_users')->where('remember_token',$request->_token)->get();
        Session::put('customers',$newUser[0]);
      
        return redirect()->route('user.account_management')->with('flash_message','Cập nhật thành công !!!');
    }
}
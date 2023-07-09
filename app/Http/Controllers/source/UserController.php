<?php

namespace App\Http\Controllers\source;

use App\Http\Controllers\Controller;
use App\Models\TableOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use PharIo\Manifest\Author;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function orderManagement(){
        // $carts = Session::get('carts');
        // $countCart=0;
        // if(!empty($carts)){
        //     foreach($carts as $item){
        //         $countCart++;
        //     }
        // }
        // $countOrder = DB::table('invoices')
        // ->whereBetween('status',[0,2])
        // ->where('userID',Session::get('customers')->id)
        // ->count();
       
        // // $monthNow = Date('m');
        // // $dateNow = Date('d');
        // // $countInvoice = DB::table('invoices')
        // // ->where('userID',Session::get('customers')->id)
        // // ->whereBetween('status',[0,2])
        // // ->whereMonth('dateCreated','=' ,1)
        // // ->whereDate('dateCreated','<' , $dateNow)
        // // ->count();
        // // ->get();
        // // dd($countInvoice);
        //  $getInvoice = DB::table('invoices')
        // ->where('userID',Session::get('customers')->id)
        // ->whereBetween('status',[0,2])
        // ->orderBy('dateCreated','desc')
        // ->select('invoices.*')
        // ->addSelect(DB::raw("null as products"))->get();
        // foreach($getInvoice as $item){
        //     $item->products = DB::table('invoice_details')
        //     ->join('products','invoice_details.productID','products.id')
        //     ->where('invoice_details.invoiceID',$item->id)
        //     ->select('products.*','invoice_details.quantity')->get();
        // } 
        // return view('user.profile.order_manage',[
        //     'count' =>$countCart,
        //     'countOrder' =>  $countOrder,
        //     'invoices'=>$getInvoice,
        // ]);
        
        $id_user = Auth::user()->id;
        $getOrder = DB::table('table_orders')
        ->where('table_orders.id_user',$id_user)
        ->join('table_orders_details','table_orders_details.id_orders','=','table_orders.id')
        ->join('table_products','table_orders_details.id_product','=','table_products.id')
        ->select('table_orders.*',DB::raw('table_products.name as nameProduct,table_orders_details.price as price'))
        ->get();
        // dd($getOrder);
        return view('layouts.user.order_management',compact('getOrder'));
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
        toastr()->success('Cập nhật thông tin thành công',['timeOut' => 2000]);
        return redirect()->route('user.account_management');
    }

    public function password(){
        return view('layouts.user.password');
    }
    public function changePassword(Request $request){

        $this->validate($request,[
            
            'password'=> 'required|min:8'
        ]);
       $old_pass = $request->old_password;
       $new_pass = $request->new_password;
       $new_pass_confirm = $request->new_password_confirm;
       
       $database_pass = Auth::user()->password;
       if(Hash::check($old_pass,$database_pass)){
            if($new_pass==$new_pass_confirm){
                $request->user()->fill([
                    'password'=> Hash::make($new_pass)
                ])->save();
                toastr()->success('Cập nhật mật khẩu thành công',['timeOut' => 2000]);
                return back();
            }else{
                toastr()->error('Mật khẩu không trùng khớp',['timeOut' => 2000]);
                return back();
            }
            
        }else{
            toastr()->error('Mật khẩu cũ không đúng',['timeOut' => 2000]);
            return back();
        }

    }
}
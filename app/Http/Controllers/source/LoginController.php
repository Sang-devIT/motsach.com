<?php

namespace App\Http\Controllers\source;

use App\Http\Controllers\Controller;
use App\Models\TableUser;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class LoginController extends Controller
{
    use AuthenticatesUsers;

    public function loginForm(){
        return view('layouts.user.login');
    }

    public function login(Request $request)
    {
       
        $this->validate($request, [
        'email' => 'required|email',
        'password' => 'required|min:6'
        ]);
        $checkAuth = Auth::guard('user')->attempt([
            'email' => $request->email,
            'password' => $request->password
        ], $request->get('remember'));
        if ( $checkAuth) {
            $checkAccount = DB::table('table_users')
            ->where('email',$request->email)
            ->select('status')->get();
            if($checkAccount[0]->status==-1){
                return redirect()->route('user.login');
            } 
            DB::table('table_users')
            ->where('email',$request->email)
            ->update([
                'remember_token' => Session::get('_token'),
                'status' => 1,
            ]);
            $pass = Session::get('_token');         
            $info = DB::table('table_users')->where('remember_token',$pass)->get();  
            foreach($info as $item){
                Session::put('customers',$item);
                Session::put('carts',[]);
            }
            toastr()->success('Đăng nhập thành công',['timeOut' => 2000]);
            // return Session::get('customers');
            return redirect()->route('index');
        }
        return back()->with('error','Tài khoản or mật khẩu không đúng!!!');
    }
    public function logout(Request $request)
    {
        Auth::guard('user')->logout();
        $request->session()->forget('customers');
        toastr()->success('Đăng xuất thành công',['timeOut' => 2000]);
        return redirect()->route('index');
    }
    public function registerForm(){
        return view('layouts.user.register');
    }
    public function register(Request $request){

        $this->validate($request,[
            'email'=> 'required|email',
            'password'=> 'required|min:6'
           ]);
    
        $checkEmail = DB::table('table_users')->where('email',$request->email)->exists();
        if($checkEmail){
            Session::put('error-email','Email đã được sử dụng');
            return redirect()->route('user.register');
        }
        if($request->password != $request->passwordConfirm){
            Session::put('error-password','Mật khẩu không trùng khớp');
            return redirect()->route('user.register');
        }
        $randomID = Date('Ymd') . Str::random(3);
        // dd($request->phone);
            TableUser::create([
                    'password' => Hash::make($request->password),
                    'email' => $request->email,
                    'fullname' => $request->fullname,
                    'address' => $request->address,
                    'phone' => $request->phone,
                    'status' => 1
            ]);
        toastr()->success('Đăng ký thành công',['timeOut' => 5000]);
        return redirect()->route('user.login');
    }
}
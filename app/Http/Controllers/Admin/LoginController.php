<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TableAdmin;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo ='/admin';

    public function __construct()
    {
        $this->middleware('guest:admin')-> except('logout');
    }
    public function loginForm(){
        return view('admin.auth.login');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function login (Request $request){
        
        $this->validate($request,[
         'email'=> 'required|email',
         'password'=> 'required|min:6'
        ]);
         if(Auth::guard('admin')->attempt([
             'email' => $request -> email,
             'password' => $request -> password,
         ], $request-> get('remember')))
         { 
            DB::table('table_admins')
            ->where('email',$request->email)
            ->update([
                'remember_token' => Session::get('_token'),
            ]);

            $token = Session::get('_token');
            $infoadmin = DB::table('table_users')->where('remember_token',$token)->get();

            foreach($infoadmin as $item){
                 Session::put(['customersadmin',$item]);
             }
            return redirect()-> intended(route('admin.dashboard'));
         } else {
       
             return back()->with('error','Tài khoản or mật khẩu không đúng!!!');
 
         }
         $users = DB::table('TableAdmin')->get();
         return view('admin.partials.sidebar', ['users' => $users]);
     }
    public function logout (Request $request){
        
        Auth::guard('admin')->logout();
        $request->session()->forget('customersadmin');
        return redirect()->route('admin.login');
    }
}

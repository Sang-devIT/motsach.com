<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TableUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class UserController extends Controller
{
    public function index()
    {
        $user = DB::table('Table_users')
        ->latest()->paginate(15);
        return view('admin.User.index',compact('user'));
    }
    public function destroy($id)
    {
        $contact = TableUser::where('id',$id)->first();
        $contact->delete();
        return redirect()->route('admin.user')->with('flash_message1', 'Xóa thành công !!!');
    }
}

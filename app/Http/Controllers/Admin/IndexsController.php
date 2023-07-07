<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TableOrder;
use Carbon\Carbon;
use Illuminate\Http\Request;

class IndexsController extends Controller
{
    public function index(){
        $today =  Carbon::now('Asia/Ho_Chi_Minh')->toDateString(); // 2018-10-18 21:15:43
        $todaymoney = TableOrder::select('*')
        ->get();
        
        // dd($todaymoney);
        return view('admin.dashboard.index',compact('todaymoney'));
    }
}

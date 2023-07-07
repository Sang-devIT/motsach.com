<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TableOrder;
use App\Models\TableUser;
use Carbon\Carbon;
use Illuminate\Http\Request;

class IndexsController extends Controller
{
    public function index(){
        $today =  Carbon::now('Asia/Ho_Chi_Minh')->toDateString(); // 2018-10-18 21:15:43
        // tổng tiền hôm nay
        $todaymoney = TableOrder::whereDate('created_at','=',$today)
        ->select('total_money')
        ->get();
        $sum = 0;
        foreach($todaymoney as $v){
            $sum += $v->total_money;
        }
        // Lượt user đăng ký
        $countUser = TableUser::whereDate('created_at','=',$today)->count();
        // Tổng đơn hàng hôm nay
        // Tổng doanh thu hôm nay
        return view('admin.dashboard.index',compact('sum','countUser'));
    }
}

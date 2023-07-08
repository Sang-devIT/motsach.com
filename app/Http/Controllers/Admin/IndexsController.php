<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TableOrder;
use App\Models\TableOrdersDetail;
use App\Models\TableProductImport;
use App\Models\TableUser;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class IndexsController extends Controller
{
    public function index(){
        // 
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
        $countUser = TableUser::count();
        // Tổng đơn hàng hôm nay
        $countOrder = TableOrdersDetail::whereDate('created_at','=',$today)->get();
        $count = 0;
        foreach($countOrder as $v){
            $count += $v->quantity;
        }
        // Tổng doanh thu hôm nay
        //  sp ban hom nay
        $orderDetail = DB::table('table_orders')
        ->whereDate('created_at','=',$today)
        ->get();
        // dd($orderDetail);
        //  sp nhap hom nay
        $importDetail = DB::table('table_product_imports')
        ->whereDate('created_at','=',$today)
        ->get();
        // dd($importDetail);
        $sumImport = 0;
        $sumExport = 0;
        foreach($importDetail as $k => $v){
            $sumImport += $v->total_money;
        }
        foreach($orderDetail as $k => $v){
            $sumExport += $v->total_money;
        }
        $sumMoney = $sumExport - $sumImport;
        // dd($importDetail);
        return view('admin.dashboard.index',compact('sum','countUser','count','sumMoney','today'));
    }
    public function statisticsByDate(Request $request){
        $data = $request->all();
        $toDate = $data['toDate'];
        $fromDate = $data['fromDate'];
        $getOrder = TableOrder::whereDate('created_at','>=',$toDate)
        ->whereDate('created_at','<=',$fromDate)->get();
        $getImport = TableProductImport::whereDate('created_at','>=',$toDate)
        ->whereDate('created_at','<=',$fromDate)->get();
        $sumOrder = 0;
        $sumImport = 0;
        $sumTotal = 0;
        foreach($getOrder as $k => $v){
           $sumOrder+=$v->total_money;
        }
        foreach($getImport as $k1 => $v1){
            $sumImport+=$v1->total_money;
        }
        $sumTotal = $sumOrder - $sumImport;
        $chart_data[] = array(
            'sumOrder' => $sumOrder,
            'sumImport' => $sumImport,
            'sumTotal' => $sumTotal,
        );
        echo $data = json_encode($chart_data);
    }
}

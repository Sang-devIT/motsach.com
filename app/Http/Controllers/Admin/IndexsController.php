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
use Carbon\CarbonPeriod;

class IndexsController extends Controller
{
    public function index()
    {
        // 
        $today =  Carbon::now('Asia/Ho_Chi_Minh')->toDateString(); // 2018-10-18 21:15:43
        // Doanh thu hôm nay
        $todaymoney = TableOrder::whereDate('created_at', '=', $today)
            ->select('total_money')
            ->get();
        $sum = 0;
        foreach ($todaymoney as $v) {
            $sum += $v->total_money;
        }
        // Lượt user đăng ký
        $countUser = TableUser::count();
        // Tổng đơn hàng hôm nay
        $countOrder = TableOrdersDetail::whereDate('created_at', '=', $today)->get();
        $count = 0;
        foreach ($countOrder as $v) {
            $count += $v->quantity;
        }
        // Lợi nhuận hôm nay
        //  sp ban hom nay
        $orderDetail = DB::table('table_orders')
            ->whereDate('created_at', '=', $today)
            ->get();
        // dd($orderDetail);
        //  sp nhap hom nay
        $importDetail = DB::table('table_product_imports')
            ->whereDate('created_at', '=', $today)
            ->get();
        // dd($importDetail);
        $sumImport = 0;
        $sumExport = 0;
        foreach ($importDetail as $k => $v) {
            $sumImport += $v->total_money;
        }
        foreach ($orderDetail as $k => $v) {
            $sumExport += $v->total_money;
        }
        $sumMoney = $sumExport - $sumImport;
        // dd($importDetail);
        return view('admin.dashboard.index', compact('sum', 'countUser', 'count', 'sumMoney', 'today'));
    }
    public function statisticsByDate(Request $request)
    {
        $data = $request->all();
        $toDate = $data['toDate'];
        $fromDate = $data['fromDate'];
        // $getOrder = DB::table('table_orders')
        //     ->select(DB::raw('Date (created_at) as date'))
        //     ->addSelect(DB::raw('SUM(total_money) as total'))
        //     ->whereDate('created_at', '>=', $toDate)
        //     ->whereDate('created_at', '<=', $fromDate)
        //     ->groupBy(DB::raw('Date (created_at)'))
        //     ->get();
        // dd($getOrder); 
        // foreach ($getOrder as $k => $v) {
        //     $sumOrder[] = $v->total;
        // }
        
        // $getImport = DB::table('table_product_imports')
        //     ->select(DB::raw('Date (created_at) as date'))
        //     ->addSelect(DB::raw('SUM(total_money) as total'))
        //     ->whereDate('created_at', '>=', $toDate)
        //     ->whereDate('created_at', '<=', $fromDate)
        //     ->groupBy(DB::raw('Date (created_at)'))
        //     ->get();
        // dd($getImport);
        // foreach ($getImport as $k => $v) {
        //     $sumImport[] = $v->total;
        // }
        // $dateChon = array();
        
        // dd($chart_data);


        //lay thoi gian tu ngay bat dau va ngay ket thuc
        $period = CarbonPeriod::create($toDate, $fromDate);
        $dates = [];
        foreach ($period as $date) {
            $dates[] = $date->toDateString();
        }
        // Lấy danh sách ngày có dữ liệu từ cơ sở dữ liệu
        $ngayCoDuLieuXuat = DB::table('table_product_imports')
            ->select(DB::raw('DATE_FORMAT(created_at, "%Y-%m-%d") as ngay_thang_nam'))
            ->addSelect(DB::raw('SUM(total_money) as total'))
            ->whereIn(DB::raw('DATE_FORMAT(created_at, "%Y-%m-%d")'), $dates)
            ->groupBy('ngay_thang_nam')
            ->pluck('total', 'ngay_thang_nam')
            ->toArray();
        $ngayCoDuLieuNhap = DB::table('table_orders')
            ->select(DB::raw('DATE_FORMAT(created_at, "%Y-%m-%d") as ngay_thang_nam'))
            ->addSelect(DB::raw('SUM(total_money) as total'))
            ->whereIn(DB::raw('DATE_FORMAT(created_at, "%Y-%m-%d")'), $dates)
            ->groupBy('ngay_thang_nam')
            ->pluck('total', 'ngay_thang_nam')
            ->toArray();

        // dd($ngayCoDuLieuNhap);
        // Tạo mảng dữ liệu với giá trị 0 cho các ngày không có dữ liệu
        $mangDuLieu = array_fill_keys($dates, 0);
        $mangDuLieu1 = array_fill_keys($dates, 0);
        // Gán giá trị dữ liệu cho các ngày có dữ liệu
        foreach ($ngayCoDuLieuXuat as $ngay => $giaTri) {
            $mangDuLieu[$ngay] = $giaTri;
        }
        foreach ($ngayCoDuLieuNhap as $ngay => $giaTri) {
            $mangDuLieu1[$ngay] = $giaTri;
        }
        $sumOrder = array();
        $sumImport = array();
        $sumTotal = array();
        $dateChon = array();
        foreach ($mangDuLieu as $k => $v) {
            $dateChon[] = $k;
        }
        foreach ($mangDuLieu as $k => $v) {
            $sumOrder[] = $v;
        }
        foreach ($mangDuLieu1 as $k => $v) {
            $sumImport[] = $v;
        }
        foreach ($mangDuLieu as $k1 => $v1) {
            foreach ($mangDuLieu1 as $k => $v) {
                if ($k == $k1) {
                    $sumTotal[] = $v-$v1;
                }
            }
        }
        $chart_data = [
            'sumOrder' => $sumOrder,
            'sumImport' => $sumImport,
            'sumTotal' => $sumTotal,
            'dateChon' => $dateChon,
        ];
        echo $data = json_encode($chart_data);
    }
}

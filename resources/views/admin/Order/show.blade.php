@extends('admin.app')
@section('title')
OrderDetail
@endsection

@section('content')
<form action="{{ route('admin.order.update',$id)}}" method="post">
    @csrf
    <div class="card card-primary card-outline text-sm mb-2">
        <div class="card-header">
            <h3 class="card-title">Thông tin chính</h3>
        </div>
        <div class="card-body row">
            <div class="form-group col-md-4 col-sm-6">
                <label style="font-size: 20px">Họ tên:</label>
                <p style="font-weight: bold;" class="font-weight-bold text-uppercase ">{{ $order->fullname }}</p>
            </div>
            <div class="form-group col-md-4 col-sm-6">
                <label style="font-size: 20px">Mã đơn hàng:</label>
                <p style="font-weight: bold;" class="">{{ $order->order_code }}</p>
            </div>
            <div class="form-group col-md-4 col-sm-6">
                <label style="font-size: 20px">Hình thức thanh toán:</label>
                <p style="font-weight: bold;" class="text-info">
                    @switch($order->order_payment)
                        @case(1)
                            Tiền mặt
                            @break
                        @case(2)
                            Chuyển khoản
                            @break
                        @default
                            Ship COD
                    @endswitch
                </p>
            </div>
            <div class="form-group col-md-4 col-sm-6">
                <label style="font-size: 20px">Điện thoại:</label>
                <p style="font-weight: bold;">{{ $order->phone }}</p>
            </div>
            <div class="form-group col-md-4 col-sm-6">
                <label style="font-size: 20px">Email:</label>
                <p style="font-weight: bold;">{{ $order->email }}</p>
            </div>
            <div class="form-group col-md-4 col-sm-6">
                <label style="font-size: 20px">Địa chỉ:</label>
                <p style="font-weight: bold;">{{ $order->address }}</p>
            </div>
            <div class="form-group col-md-4 col-sm-6">
                <label style="font-size: 20px">Ngày đặt:</label>
                <p style="font-weight: bold;">{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $order->order_date)->format('d/m/Y') }}</p>
            </div>
            <div class="form-group col-md-4 col-sm-6">
                <label for="order_status" class="mr-2">Tình trạng:</label>
                <select name="status" class="form-control" id="">
                    <option value="1" {{ old('status')==1 || $order->status==1 ? 'selected' : false }}>Đã đặt</option>
                    <option value="2" {{ old('status')==2 || $order->status==2 ? 'selected' : false }}>Đang giao</option>
                    <option value="3" {{ old('status')==3 || $order->status==3 ? 'selected' : false }}>Đã giao</option>
                    <option value="4" {{ old('status')==4 || $order->status==4 ? 'selected' : false }}>Đã hủy</option>
                </select>
            </div>
            <div class="form-group col-12">
                <label style="font-size: 20px">Nội dung:</label>
                <textarea class="form-control text-sm" name="noidung" id="noidung" rows="5" readonly>{{ $order->requirements }}</textarea>
            </div>
        </div>
    </div>
    <div class="card card-primary card-outline text-sm mb-2">
        <div class="card-header">
            <h3 class="card-title">Chi tiết đơn hàng</h3>
        </div>
        <div class="card-body row">
            <table class="table">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Ảnh</th>
                        <th>Tên sản phẩm</th>
                        <th>Số lượng</th>
                        <th>Đơn giá</th>
                        <th>Thành tiền</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orderDetail as $k => $v)    
                    <tr>
                        <td>{{ ($k+1) }}</td>
                        <td><img src={{ asset('assets/images/upload/product/'.$v->photoPro) }} style="cursor: zoom-in;" width="60px"/></td>
                        <td>{{ $v->namePro }}</td>
                        <td>{{ $v->quantity }}</td>
                        <td>{{ number_format($v->price,0,",",",") }} VNĐ</td>
                        <td>{{ number_format($v->total_money,0,",",",") }} VNĐ</td>
                    </tr>
                    @endforeach
                    <tr>
                        <td colspan="5" class="title-money-cart-detail" style="text-align: end;font-weight: bold;font-size: 20px;">Tổng tiền:</td>
                        <td colspan="1" class="cast-money-cart-detail" style="color: red;font-weight: bold;font-size: 20px;">{{ number_format($v->total,0,",",",") }} VNĐ</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="form-group">
        <input type="submit" value="Cập nhật" class="btn btn-success {{ $order->status==4 ? 'd-xl-none':''; }}">
    </div>
</form>
@endsection
@extends('layouts.app')

@section('content')
<div class="container mt-4 mb-4 ">
            <form class="needs-validation" name="frmthanhtoan" method="post"
                action="{{ route('order.checkout.store') }}">
                @csrf
                
                <div class="py-5 text-center">
                    <i class="fa fa-credit-card fa-4x" aria-hidden="true"></i>
                    <h2>Thanh toán</h2>
                    <p class="lead">Vui lòng kiểm tra thông tin Khách hàng, thông tin Giỏ hàng trước khi Đặt hàng.</p>
                </div>

                <div class="row">
                    <div class="col-md-6 order-md-2 mb-4">
                        <h4 class="d-flex justify-content-between align-items-center mb-3">
                            <span class="text-muted">Giỏ hàng</span>
                            <span class="badge badge-secondary badge-pill">{{ Cart::content()->count(); }}</span>
                        </h4>
                        <ul class="list-group mb-3">
                            @foreach($orders as $item)
                                <li class="list-group-item d-flex justify-content-between lh-condensed">
                                    <div>
                                        <h3 class="my-0">{{ $item->name }}</h3>
                                        <small class="text-muted">{{ number_format($item->price,0,",",",") }} x {{ $item->qty }}</small>
                                    </div>
                                    <span class="text-muted">{{ number_format($item->subtotal,0,",",",") }}</span>
                                </li>
                            @endforeach
                            <li class="list-group-item d-flex justify-content-between">
                                <span>Tổng thành tiền</span>
                                <strong>{{ number_format(Cart::total(), 0, ",", ".") }}</strong>
                            </li>
                            @if(session('flash_message'))
                            <div class="close-flash_message" style="color: red;font-size: 14px;">{{ session('flash_message') }}</div>
                            @endif
                        </ul>
                    </div>
                    <div class="col-md-6 order-md-1">
                        <h3 class="mb-3">Thông tin khách hàng</h3>

                        <div class="row">
                            <div class="col-md-12">
                                <label for="fullname">Họ tên</label>
                                <input type="text" class="form-control" name="fullname" id="fullname"
                                    value="{{Session::get('customers')->fullname}}" required>
                            </div>
                            <div class="col-md-12">
                                <label for="address">Địa chỉ</label>
                                <input type="text" class="form-control" name="address" id="address"
                                    value="{{Session::get('customers')->address}}" required>
                            </div>
                            <div class="col-md-12">
                                <label for="phone">Điện thoại</label>
                                <input type="text" class="form-control" name="phone" id="phone"
                                    value="{{Session::get('customers')->phone}}" required>
                            </div>
                            <div class="col-md-12">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" name="email" id="email"
                                    value="{{Session::get('customers')->email}}" required>
                            </div>
                            <div class="col-md-12">
                                <label for="requirements">Nội dung</label>
                                <input type="text" class="form-control" name="requirements" id="email"
                                    value="{{ old('requirements') }}">
                            </div>
                        </div>

                        <h3 class="mb-3">Hình thức thanh toán</h3>

                        <div class="d-block my-3">
                            <div class="custom-control custom-radio">
                                <input id="httt-1" name="httt_ma" type="radio" class="custom-control-input" required=""
                                    value="1">
                                <label class="custom-control-label" for="httt-1">Tiền mặt</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input id="httt-2" name="httt_ma" type="radio" class="custom-control-input" required=""
                                    value="2">
                                <label class="custom-control-label" for="httt-2">Chuyển khoản</label>
                            </div>
                        </div>
                        <hr class="mb-4">
                        <button class="btn btn-primary btn-lg btn-block btn-dathang" type="submit" name="btnDatHang">Đặt
                            hàng</button>
                    </div>
                </div>
            </form>
        </div>
@endsection
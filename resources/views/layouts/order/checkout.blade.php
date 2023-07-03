@extends('layouts.app')

@section('content')
<div class="container mt-4">
            <form class="needs-validation" name="frmthanhtoan" method="post"
                action="#">
                <input type="hidden" name="kh_tendangnhap" value="dnpcuong">

                <div class="py-5 text-center">
                    <i class="fa fa-credit-card fa-4x" aria-hidden="true"></i>
                    <h2>Thanh toán</h2>
                    <p class="lead">Vui lòng kiểm tra thông tin Khách hàng, thông tin Giỏ hàng trước khi Đặt hàng.</p>
                </div>

                <div class="row">
                    <div class="col-md-4 order-md-2 mb-4">
                        <h4 class="d-flex justify-content-between align-items-center mb-3">
                            <span class="text-muted">Giỏ hàng</span>
                            <span class="badge badge-secondary badge-pill">{{ Cart::content()->count(); }}</span>
                        </h4>
                        <ul class="list-group mb-3">
                            @foreach($orders as $item)
                                <li class="list-group-item d-flex justify-content-between lh-condensed">
                                    <div>
                                        <h6 class="my-0">{{ $item->name }}</h6>
                                        <small class="text-muted">{{ number_format($item->price,0,",",",") }} x {{ $item->qty }}</small>
                                    </div>
                                    <span class="text-muted">{{ number_format($item->subtotal,0,",",",") }}</span>
                                </li>
                            @endforeach
                            <li class="list-group-item d-flex justify-content-between">
                                <span>Tổng thành tiền</span>
                                <strong>{{ number_format(Cart::total(), 0, ",", ".") }}</strong>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-8 order-md-1">
                        <h4 class="mb-3">Thông tin khách hàng</h4>

                        <div class="row">
                            <div class="col-md-12">
                                <label for="fullname">Họ tên</label>
                                <input type="text" class="form-control" name="fullname" id="fullname"
                                    value="{{ old('fullname') }}" >
                            </div>
                            <div class="col-md-12">
                                <label for="address">Địa chỉ</label>
                                <input type="text" class="form-control" name="address" id="address"
                                    value="{{ old('address') }}" >
                            </div>
                            <div class="col-md-12">
                                <label for="phone">Điện thoại</label>
                                <input type="text" class="form-control" name="phone" id="phone"
                                    value="{{ old('phone') }}" >
                            </div>
                            <div class="col-md-12">
                                <label for="email">Email</label>
                                <input type="text" class="form-control" name="email" id="email"
                                    value="{{ old('email') }}" >
                            </div>
                            <div class="col-md-12">
                                <label for="requirements">Nội dung</label>
                                <textarea type="text" name="requirements" rows="5" class="form-control"  value="{{ old('requirements') }}"></textarea>
                            </div>
                        </div>

                        <h4 class="mb-3">Hình thức thanh toán</h4>

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
                            <div class="custom-control custom-radio">
                                <input id="httt-3" name="httt_ma" type="radio" class="custom-control-input" required=""
                                    value="3">
                                <label class="custom-control-label" for="httt-3">Ship COD</label>
                            </div>
                        </div>
                        <hr class="mb-4">
                        <button class="btn btn-primary btn-lg btn-block" type="submit" name="btnDatHang">Đặt
                            hàng</button>
                    </div>
                </div>
            </form>

        </div>
@endsection
@extends('admin.app')
@section('title')
ProductImport
@endsection

@section('content')
<div class="card">
    <div class="card-header pb-0"><h3>Xem chi tiết hóa đơn nhập</h3></div>
        <div class="card-body pt-0">
            <form action="{{ route('admin.productimport.show',$id)}}" method="get">
                @csrf
                @method('GET')
                <div class="card-body">
                    <div class="row" style="margin: 0 -5px;">
                        @foreach($cthdnhap as $key => $item)
                            <div class="col-6" style="padding: 5px;">
                                <div style="border: 1px solid #ccc;padding: 15px;">
                                    <h5 class="card-title"><span style="font-weight: bold;font-size: 20px;"> Mã hóa đơn :</span> {{ $item->codeProductImport  }}</h5><br>
                                    <h5 class="card-title"><span style="font-weight: bold;font-size: 20px;">Tên sản phẩm : </span>{{ $item->nameProduct  }}</h5><br>
                                    <h5 class="card-title"><span style="font-weight: bold;font-size: 20px;">Ngày nhập : </span>{{ \Carbon\Carbon::parse($item->dateProductImport)->format('d-m-Y') }}</h5><br>
                                    <h5 class="card-title"><span style="font-weight: bold;font-size: 20px;">Số lượng : </span>{{ $item->quantity }}</h5><br>
                                    <h5 class="card-title"><span style="font-weight: bold;font-size: 20px;">Giá nhập : </span>{{ number_format($item->price,0,",",",") }} VNĐ</h5><br>
                                    <h5 class="card-title"><span style="font-weight: bold;font-size: 20px;">Thành tiền : </span>{{ number_format(($item->price*$item->quantity),0,",",",") }} VNĐ</h5>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
              </form>
        </div>
    </div>
@endsection
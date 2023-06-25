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
                    <h5 class="card-title"><span style="font-weight: bold;font-size: 30px;"> Mã hóa đơn :</span> {{ $productImport->import_code }}</h5><br>
                    <h5 class="card-title"><span style="font-weight: bold;font-size: 30px;">Tên sản phẩm : </span>{{ $product->name }}</h5><br>
                    <h5 class="card-title"><span style="font-weight: bold;font-size: 30px;">Ngày nhập : </span>{{ $productImport->import_date }}</h5><br>
                    <h5 class="card-title"><span style="font-weight: bold;font-size: 30px;">Số lượng : </span>{{ $contact[0]->quantity }}</h5><br>
                    <h5 class="card-title"><span style="font-weight: bold;font-size: 30px;">Giá nhập : </span>{{ $contact[0]->price }}</h5><br>
                    <h5 class="card-title"><span style="font-weight: bold;font-size: 30px;">Tổng tiền : </span>{{ $productImport->total_money }}</h5><br>
                  </div>
              </form>
        </div>
    </div>
@endsection
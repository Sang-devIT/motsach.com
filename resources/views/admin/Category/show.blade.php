@extends('admin.app')
@section('title')
Category
@endsection

@section('content')
<div class="card">
    <div class="card-header pb-0"><h3>Xem chi tiết loại sản phẩm</h3></div>
        <div class="card-body pt-0">
            <form action="{{ route('admin.category.show',$id)}}" method="get">
                @csrf
                @method('GET')
                  <div class="card-body">
                    <h5 class="card-title"><span style="font-weight: bold;font-size: 30px;"> Tên loại :</span> {{ $contact->name }}</h5><br>
                    <h5 class="card-title"><span style="font-weight: bold;font-size: 30px;">Trạng thái : </span>{{ $contact->status==1?'Kích hoạt':'Chưa kích hoạt'; }}</h5><br>
                  </div>
              </form>
        </div>
    </div>
@endsection
@extends('admin.app')
@section('title')
Product
@endsection

@section('content')
<div class="card">
    <div class="card-header pb-0"><h3>Xem chi tiết sản phẩm</h3></div>
        <div class="card-body pt-0">
            <form action="{{ route('admin.product.show',$id)}}" method="get">
                @csrf
                @method('GET')
                <div class="card-body">
                @foreach ($contact as $item )    
                    <h5 class="card-title"><span style="font-weight: bold;font-size: 25px;display:block;"> Hình ảnh :</span><img src="{{ asset('assets/images/upload/product/'.$item->photo) }}" style="cursor: zoom-in;" width="300px" height="300px"></h5><br>
                    <h5 class="card-title"><span style="font-weight: bold;font-size: 25px;"> Tên sản phẩm :</span> {{ $item->name }}</h5><br>
                    <h5 class="card-title"><span style="font-weight: bold;font-size: 25px;"> Mã sản phẩm :</span> {{ $item->code }}</h5><br>
                    <h5 class="card-title"><span style="font-weight: bold;font-size: 25px;"> Tên loại sách :</span> {{ $category->name }}</h5><br>
                    <h5 class="card-title"><span style="font-weight: bold;font-size: 25px;"> Tên nhà sản xuất :</span> {{ $produce->name }}</h5><br>
                    <h5 class="card-title"><span style="font-weight: bold;font-size: 25px;"> Tên tác giả :</span> {{ $author->name }}</h5><br>
                    <h5 class="card-title"><span style="font-weight: bold;font-size: 25px;"> Giá :</span> {{ $item->regular_price }}</h5><br>
                    <h5 class="card-title"><span style="font-weight: bold;font-size: 25px;"> Số lượng tồn :</span> {{ $item->stock }}</h5><br>
                    <h5 class="card-title"><span style="font-weight: bold;font-size: 25px;">Mô tả : </span>{{ $item->desc }}</h5><br>
                    <h5 class="card-title"><span style="font-weight: bold;font-size: 25px;">Nội dung : </span>{{ $item->content }}</h5><br>
                    <h5 class="card-title"><span style="font-weight: bold;font-size: 25px;">Trạng thái : </span>{{ $item->status==1?'Kích hoạt':'Chưa kích hoạt'; }}</h5><br>
                @endforeach
                </div>
            </form>
            <a href="{{route('admin.product') }}"><button class="btn btn-success btn-sm">Back</button></a>
        </div>
    </div>
@endsection
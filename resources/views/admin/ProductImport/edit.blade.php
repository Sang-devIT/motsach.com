@extends('admin.app')
@section('title')
ProductImport
@endsection

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-start pb-0"><h5 class="title-1">Hóa đơn nhập / </h5><h5>Cập nhật hóa đơn nhập</h5></div>
        <div class="card-body pt-0">
            <form action="{{ route('admin.productimport.update',$id)}}" enctype="multipart/form-data" method="post">
                @csrf
                @method("POST")
                <div class="form-group">
                    <label for="id_product">Tên sản phẩm</label>
                    <select class="form-control" id="id_product" name="id_product">
                        <option hidden value="{{ $contact[0]->idProduct }}">{{ $contact[0]->nameProduct }}</option>
                        @foreach ($pro as $item )
                            <option value="{{ $item->id }}"{{ old('id_product')==$item->id?'selected':false }}>{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Số lượng</label>
                    <input type="text" name="quantity" class="form-control" id="quantity" value="{{ $contact[0]->quantity }}">
                </div>
                <div class="form-group">
                    <label>Giá nhập</label>
                    <input type="text" name="price" class="form-control" id="price" value="{{ $contact[0]->price }}">
                </div>
                <div class="form-group">
                    <input type="submit" value="Cập nhật" class="btn btn-success">
                </div>
            </form>
        </div>
    </div>
@endsection 
@extends('admin.app')
@section('title')
Product
@endsection

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-start pb-0"><h5 class="title-1">Sản phẩm / </h5><h5> Thêm sản phẩm</h5></div>
        <div class="card-body pt-0">
            <form action="{{ route('admin.productimport.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="id_product">Tên sản phẩm</label>
                    <select class="form-control" name="id_product" id="id_product">
                        @foreach ($pro as $item )
                            <option value="{{ $item->id }}"{{ old('id_product')==$item->id?'selected':false }}>{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="row">
                    <div class="form-group col-lg-4">
                        <label>Số lượng</label>
                        <input type="number" name="quantity" class="form-control" placeholder="Nhập số lượng" value="{{ old('quantity') }}">
                        <span style="color: red">@error('quantity'){{ 'Vui lòng nhập số lượng' }}@enderror</span>
                    </div>
                    <div class="form-group col-lg-4">
                        <label>Giá bán</label>
                        <div class="input-group">
                            <input type="number" class="form-control format-price price text-sm" name="price" id="price" placeholder="Giá nhập" value="{{ old('price') }}">
                            <div class="input-group-append">
                                <div class="input-group-text"><strong>VNĐ</strong></div>
                            </div>
                        </div>
                        <span style="color: red">@error('price'){{ 'Vui lòng nhập giá' }}@enderror</span>
                    </div>
                </div>
                <div class="form-group">
                    <input type="submit" value="Lưu" class="btn btn-success">
                </div>
            </form>
        </div>
    </div>
@endsection

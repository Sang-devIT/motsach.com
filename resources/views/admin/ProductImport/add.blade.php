@extends('admin.app')
@section('title')
Product
@endsection

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-start pb-0"><h5 class="title-1">Hóa đơn nhập/ </h5><h5> Thêm hóa đơn nhập</h5></div>
        <div class="card-body pt-0">
            <form action="{{ route('admin.productimport.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div id="showEle"></div>
                <div class="form-group">
                    <input type="submit" value="Lưu" class="btn btn-success">
                    <button type="button" class="btn btn-success btn-addrow">Thêm sản phẩm</button>
                </div>
            </form>
        </div>
    </div>
@endsection
@push('scripts')
<script  type="text/javascript">

    var temp = '<div class="form-group">\
                        <label for="id_product">Tên sản phẩm</label>\
                        <select class="form-control" name="data[id_product][]" id="id_product">';
                            @foreach ($pro as $item )
                                temp += '<option value="{{ $item->id }}"{{ old('id_product')==$item->id?'selected':false }}>{{ $item->name }}</option>';
                            @endforeach
                            temp += '</select>';
                    temp += '</div>\
                    <div class="row">\
                        <div class="form-group col-lg-4">\
                            <label>Số lượng</label>\
                            <input type="number" name="data[quantity][]" class="form-control" placeholder="Nhập số lượng" value="{{ old('quantity') }}" required>\
                        </div>\
                        <div class="form-group col-lg-4">\
                            <label>Giá bán</label>\
                            <div class="input-group">\
                                <input type="number" class="form-control format-price price text-sm" name="data[price][]" id="price" placeholder="Giá nhập" value="{{ old('price') }}" required>\
                                <div class="input-group-append">\
                                    <div class="input-group-text"><strong>VNĐ</strong></div>\
                                </div>\
                            </div>\
                        </div>\
                    </div>';
      $(document).ready(function () {
        $('body').on('click', '.btn-addrow', function(){
          
            $('#showEle').append(temp);
          
        })
      });
    </script>
@endpush
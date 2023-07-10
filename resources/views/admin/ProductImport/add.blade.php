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
                <div class="div-select">
                    <select name="product[]" class="select-muti" id="" multiple>
                        @foreach ($pro as $item )
                                <option value="{{ $item->id }}"{{ old('id_product')==$item->id?'selected':false }}>{{ $item->name }}</option>
                            @endforeach
                    </select>
                </div>
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

                    function setTempProduct(name,id) { 
                        var temp = '<div class="box-item-import-pro"><div class="form-group mb-0">\
                            <div for="id_product" class="title-name"><span>Tên Sản phẩm:</span>'+name+'</div>\
                            <input type="hidden" value="'+id+'" class="form-control" name="data[id_product][]">\
                        </div>';
                        temp += '<div class="row">\
                            <div class="form-group col-lg-4">\
                                <label>Số lượng</label>\
                                <input type="number" name="data[quantity][]" class="form-control" placeholder="Nhập số lượng" value="{{ old('quantity') }}" required>\
                            </div>\
                            <div class="form-group col-lg-4">\
                                <label>Giá nhập</label>\
                                <div class="input-group">\
                                    <input type="number" class="form-control format-price price text-sm" name="data[price][]" id="price" placeholder="Giá nhập" value="{{ old('price') }}" required>\
                                    <div class="input-group-append">\
                                        <div class="input-group-text"><strong>VNĐ</strong></div>\
                                    </div>\
                                </div>\
                            </div>\
                        </div></div>';
                        return temp;
                    }
      $(document).ready(function () {
        $('body').on('click', '.btn-addrow', function(){
            // $('.div-select').addClass('d-xl-none');
            var $a = $('.select-muti').val();
            var h = '';
            $('.select-muti option:selected').each( function (i, v) { 
                 var t = setTempProduct($(this).text(),$(this).val());
                 h += t;
            });
            $('#showEle').append(h);
          
        });
        $(".select-muti").select2({
            width: "100%"
        });
      });
    </script>
@endpush
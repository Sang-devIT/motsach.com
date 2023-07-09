@extends('admin.app')
@section('title')
Product
@endsection

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-start pb-0"><h5 class="title-1">Sản phẩm / </h5><h5> Thêm sản phẩm</h5></div>
        <div class="card-body pt-0">
            <form action="{{ route('admin.product.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>Ảnh</label>
                    <input type="file" name="photo" class="form-control" placeholder="Chọn file">
                </div>
                <div class="form-group">
                    <label>Tên sản phẩm</label>
                    <input type="text" name="name" class="form-control" placeholder="Nhập tên sản phẩm" value="{{ old('name') }}">
                    <span style="color: red">@error('name'){{ $message }}@enderror</span>
                </div>
                <div class="row">
                    <div class="form-group col-lg-4">
                        <label for="id_category">Loại sách</label>
                        <select class="form-control" name="id_category" id="id_category">
                            @foreach ($category as $item )
                                <option value="{{ $item->id }}"{{ old('id_category')==$item->id?'selected':false }}>{{ $item->name }}</option>
                            @endforeach
                        </select>
                        <span style="color: red">@error('id_category'){{ 'Vui lòng chọn loại sách' }}@enderror</span>
                    </div>
                    <div class="form-group col-lg-4">
                        <label for="id_produce">Nhà sản xuất</label>
                        <select class="form-control" name="id_produce" id="id_produce">
                            @foreach ($produce as $item )
                                <option value="{{ $item->id }}"{{ old('id_produce')==$item->id?'selected':false }}>{{ $item->name }}</option>
                            @endforeach
                        </select>
                        <span style="color: red">@error('id_produce'){{ 'Vui lòng chọn nhà sản xuất' }}@enderror</span>
                    </div>
                    <div class="form-group col-lg-4">
                        <label for="id_author">Tác giả</label>
                        <select class="form-control" name="id_author" id="id_author">
                            @foreach ($author as $item )
                                <option value="{{ $item->id }}"{{ old('id_author')==$item->id?'selected':false }}>{{ $item->name }}</option>
                            @endforeach
                        </select>
                        <span style="color: red">@error('id_author'){{ 'Vui lòng chọn tác giả' }}@enderror</span>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-lg-4">
                        <label>Giá bán</label>
                        <div class="input-group">
                            <input type="number" class="form-control format-price regular_price text-sm" name="regular_price" id="regular_price" placeholder="Giá bán" value="{{ old('regular_price') }}">
                            <div class="input-group-append">
                                <div class="input-group-text"><strong>VNĐ</strong></div>
                            </div>
                        </div>
                        <span style="color: red">@error('regular_price'){{ $message }}@enderror</span>
                    </div>
                    
                </div>
                <div class="form-group">
                    <label>Mô tả</label>
                    <textarea type="text" name="desc" rows="5" class="form-control" placeholder="Nhập mô tả" value="{{ old('desc') }}"></textarea>
                </div>
                <div class="form-group">
                    <label>Nội dung</label>
                    <textarea type="text" name="content" rows="5" class="form-control" placeholder="Nhập nội dung" value="{{ old('content') }}"></textarea>
                </div>
                <div class="form-group">
                    <label>Trạng thái</label>
                    <select name="status" class="form-control" id="">
                        <option value="0" {{ old('status')==0 ? 'selected' : false }}>Chưa kích hoạt</option>
                        <option value="1" {{ old('status')==1 ? 'selected' : false }}>Kích hoạt</option>
                    </select>
                </div>
                {{-- <div class="mb-3 upload">
                    <div class="upload__box">
                        <div class="upload__btn-box">
                            <label class="upload__btn">
                            <p>Thư viện ảnh</p>
                            {!! Form::file('gallery[]', ['class' => ['card__file2', 'form-control','bg-dark', 'mt-2', 'upload__inputfile'], 'multiple', "data-max_length=20"]) !!}
                            </label>
                        </div>
                        <div class="upload__img-wrap"></div>
                    </div>
                </div> --}}
                <div class="form-group">
                    <label>Thư viện ảnh</label>
                    {{-- <input type="file" name="gallerys[]" class="form-control input-file" placeholder="Chọn file"  multiple> --}}
                    {!! Form::file('gallery[]', ['class' => ['card__file2', 'form-control','input-file'], 'multiple', "data-max_length=20", 'placeholder' => "Chọn file" ]) !!}
                   
                </div>
                <div class="form-group">
                    <input type="submit" value="Lưu" class="btn btn-success">
                </div>
            </form>
        </div>
    </div>
@endsection

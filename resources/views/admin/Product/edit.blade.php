@extends('admin.app')
@section('title')
Product
@endsection

@section('content')
    <div class="card">
        <div class="card-header pb-0"><h3>Cập nhật sản phẩm</h3></div>
        <div class="card-body pt-0">
            <form action="{{ route('admin.product.update',$id)}}" enctype="multipart/form-data" method="post">
                @csrf
                @method("POST")
                <div class="form-group">
                    <label>Tên sản phẩm</label>
                    <input type="text" name="name" class="form-control" id="name" value="{{ $contact[0]->name }}">
                </div>
                <div class="form-group">
                    <label>Slug sản phẩm</label>
                    <input type="text" name="slug" class="form-control bg-secondary text-white" id="slug" value="{{ $contact[0]->slug }}" readonly>
                </div>
                <div class="form-group">
                    <label>Mã sản phẩm</label>
                    <input type="text" name="code" class="form-control bg-secondary text-white" id="code" value="{{ $contact[0]->code }}" readonly>
                </div>
                <div class="form-group">
                    <label>Images</label>
                    <input type="file" name="photo" id="photo" class="form-control" value="{{ $contact[0]->photo }}">
                    <img src="{{ asset('assets/images/upload/product/'.$contact[0]->photo) }}" style="cursor: zoom-in;" width="300px" height="300px">
                </div>
                <div class="row">
                    <div class="form-group col-lg-4">
                        <label for="id_category">Loại sản phẩm</label>
                        <select class="form-control" id="id_category" name="id_category">
                            <option hidden value="{{ $contact[0]->idCategory }}">{{ $contact[0]->nameCategory }}</option>
                            @foreach ($category as $item )
                                <option value="{{ $item->id }}"{{ old('id_category')==$item->id?'selected':false }}>{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-lg-4">
                        <label for="id_produce">Nhà sản xuất</label>
                        <select class="form-control" id="id_produce" name="id_produce">
                            <option hidden value="{{ $contact[0]->idProduce }}">{{ $contact[0]->nameProduce }}</option>
                            @foreach ($produce as $item )
                                <option value="{{ $item->id }}"{{ old('id_produce')==$item->id?'selected':false }}>{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-lg-4">
                        <label for="id_author">Tác giả</label>
                        <select class="form-control" id="id_author" name="id_author">
                            <option hidden value="{{ $contact[0]->idAuthor }}">{{ $contact[0]->nameAuthor }}</option>
                            @foreach ($produce as $item )
                                <option value="{{ $item->id }}"{{ old('id_author')==$item->id?'selected':false }}>{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-lg-6">
                        <label>Giá bán</label>
                        <div class="input-group">
                            <input type="number" class="form-control format-price regular_price text-sm" name="regular_price" id="regular_price" placeholder="Giá bán" value="{{ $contact[0]->regular_price }}">
                            <div class="input-group-append">
                                <div class="input-group-text"><strong>VNĐ</strong></div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-lg-6">
                        <label>Số lượng tồn</label>
                        <input type="number" name="stock" class="form-control bg-secondary text-white" placeholder="Nhập số lượng tồn" value="{{ ($contact[0]->stock)?$contact[0]->stock:0 }}" readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label>Mô tả</label>
                    <textarea type="text" name="desc" rows="5" class="form-control" placeholder="Nhập mô tả" value="{{ $contact[0]->desc }}">{{ $contact[0]->desc }}</textarea>
                </div>
                <div class="form-group">
                    <label>Nội dung</label>
                    <textarea type="text" name="content" rows="5" class="form-control" placeholder="Nhập nội dung" value="{{ $contact[0]->content }}">{{ $contact[0]->content }}</textarea>
                </div>
                <div class="form-group">
                    <label>Trạng thái</label>
                    <select name="status" class="form-control" id="">
                        <option value="0" {{ old('status')==0 || $contact[0]->status==0 ? 'selected' : false }}>Chưa kích hoạt</option>
                        <option value="1" {{ old('status')==1 || $contact[0]->status==1 ? 'selected' : false }}>Kích hoạt</option>
                    </select>
                </div>
                <div class="form-group">
                    <input type="submit" value="Cập nhật" class="btn btn-success">
                </div>
            </form>
        </div>
    </div>
@endsection 
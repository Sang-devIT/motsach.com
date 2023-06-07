@extends('admin.app')
@section('title')
Banner
@endsection

@section('content')
    <div class="card">
        <div class="card-header pb-0"><h3>Thêm hình ảnh banner</h3></div>
        <div class="card-body pt-0">
            <form action="{{ route('admin.banner.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>Images</label>
                    <input type="file" name="photo" class="form-control" placeholder="Chọn file">
                </div>
                <div class="form-group">
                    <label>Tên banner</label>
                    <input type="text" name="name" class="form-control" placeholder="Nhập tên banner" value="{{ old('name') }}">
                    <span style="color: red">@error('name'){{ 'Vui lòng nhập tên' }}@enderror</span>
                </div>
                <div class="form-group">
                    <label>Link banner</label>
                    <input type="text" name="link" class="form-control" placeholder="Nhập link banner" value="{{ old('link') }}">
                    <span style="color: red">@error('link'){{ 'Vui lòng nhập link' }}@enderror</span>
                </div>
                <div class="form-group">
                    <label>Type banner</label>
                    <input type="text" name="type" class="form-control" placeholder="Nhập type banner" value="{{ old('type') }}">
                    <span style="color: red">@error('type'){{ 'Vui lòng nhập type' }}@enderror</span>
                </div>
                <div class="form-group">
                    <label>Trạng thái</label>
                    <select name="status" class="form-control" id="">
                        <option value="0" {{ old('status')==0 ? 'selected' : false }}>Chưa kích hoạt</option>
                        <option value="1" {{ old('status')==1 ? 'selected' : false }}>Kích hoạt</option>
                    </select>
                </div>
                <div class="form-group">
                    <input type="submit" value="Lưu" class="btn btn-success">
                </div>
            </form>
        </div>
    </div>
@endsection 
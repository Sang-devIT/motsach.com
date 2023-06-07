@extends('admin.app')
@section('title')
Category
@endsection

@section('content')
    <div class="card">
        <div class="card-header pb-0"><h3>Thêm loại sản phẩm</h3></div>
        <div class="card-body pt-0">
            <form action="{{ route('admin.category.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <label>Tên loại sản phẩm</label>
                    <input type="text" name="name" class="form-control" placeholder="Nhập tên loại sản phẩm" value="{{ old('name') }}">
                    <span style="color: red">@error('name'){{ 'Vui lòng nhập tên' }}@enderror</span>
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
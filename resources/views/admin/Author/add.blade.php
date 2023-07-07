@extends('admin.app')
@section('title')
Author
@endsection

@section('content')
    <div class="card">
        <div class="card-header pb-0"><h3>Thêm tác giả</h3></div>
        <div class="card-body pt-0">
            <form action="{{ route('admin.author.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <label>Tên tác giả</label>
                    <input type="text" name="name" class="form-control" placeholder="Nhập tên tác giả" value="{{ old('name') }}">
                    <span style="color: red">@error('name'){{ $message }}@enderror</span>
                </div>
                <div class="form-group">
                    <label>Mô tả</label>
                    <textarea type="text" name="desc" rows="5" class="form-control" placeholder="Nhập mô tả" value="{{ old('desc') }}"></textarea>
                </div>
                <div class="form-group">
                    <label>Trạng thái</label>
                    <select name="status" class="form-control" id="">
                        <option value="1" {{ old('status')==1 ? 'selected' : false }}>Kích hoạt</option>
                        <option value="0" {{ old('status')==0 ? 'selected' : false }}>Chưa kích hoạt</option>
                    </select>
                </div>
                <div class="form-group">
                    <input type="submit" value="Lưu" class="btn btn-success">
                </div>
            </form>
        </div>
    </div>
@endsection 
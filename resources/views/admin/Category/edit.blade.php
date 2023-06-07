@extends('admin.app')
@section('title')
Category
@endsection

@section('content')
    <div class="card">
        <div class="card-header pb-0"><h3>Cập nhật loại sản phẩm</h3></div>
        <div class="card-body pt-0">
            <form action="{{ route('admin.category.update',$id)}}" method="post">
                @csrf
                @method("POST")
                <div class="form-group">
                    <label>Tên loại sản phẩm</label>
                    <input type="text" name="name" class="form-control" id="name" value="{{ $contact->name }}">
                </div>
                <div class="form-group">
                    <label>Trạng thái</label>
                    <select name="status" class="form-control" id="">
                        <option value="0" {{ old('status')==0 || $contact->status==0 ? 'selected' : false }}>Chưa kích hoạt</option>
                        <option value="1" {{ old('status')==1 || $contact->status==1 ? 'selected' : false }}>Kích hoạt</option>
                    </select>
                </div>
                <div class="form-group">
                    <input type="submit" value="Cập nhật" class="btn btn-success">
                </div>
            </form>
        </div>
    </div>
@endsection 
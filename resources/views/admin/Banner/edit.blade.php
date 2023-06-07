@extends('admin.app')
@section('title')
Banner
@endsection

@section('content')
    <div class="card">
        <div class="card-header pb-0"><h3>Cập nhật banner</h3></div>
        <div class="card-body pt-0">
            <form action="{{ route('admin.banner.update',$id)}}" enctype="multipart/form-data" method="post">
                @csrf
                @method("POST")
                <div class="form-group">
                    <label>Tên banner</label>
                    <input type="text" name="name" class="form-control" id="name" value="{{ $contact->name }}">
                </div>
                <div class="form-group">
                    <label>Images</label>
                    <input type="file" name="photo" id="photo" class="form-control" value="{{ $contact->photo }}">
                    <img src="{{ asset('assets/images/upload/banner/'.$contact->photo) }}" style="cursor: zoom-in;" width="300px" height="300px">
                </div>
                <div class="form-group">
                    <label>Link</label>
                    <input type="text" name="link" class="form-control" id="link" value="{{ $contact->link }}">
                </div>
                <div class="form-group">
                    <label>Type banner</label>
                    <input type="text" name="type" class="form-control" id="type" value="{{ $contact->type }}">
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
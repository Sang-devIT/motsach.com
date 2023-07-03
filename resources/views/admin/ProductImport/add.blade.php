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
    
@endpush
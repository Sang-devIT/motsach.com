@extends('admin.app')
@section('title')
Product
@endsection

@section('content')
    <div class="card">
        <div class="card-header" >
            <h4>Danh sách sản phẩm</h4>
            @if(session('flash_message'))
                <div class="close-flash_message" style="color: green;font-size: 14px;">{{ session('flash_message') }}</div>
            @endif
            @if(session('flash_message1'))
                <div class="close-flash_message" style="color: red;font-size: 14px;">{{ session('flash_message1') }}</div>
            @endif
            <form class="d-flex timkiem" method="GET" action="{{ route('admin.product.search') }}">
                <input class="form-control me-2" name="search" type="text" placeholder="Tìm kiếm sản phẩm">
                <button class="btn btn-info" type="submit">Tìm kiếm</button>
            </form>
        </div>
        <div class="card-body">
            <a href="{{ route('admin.product.create') }}" class="btn btn-success btn-sm" title="Add New Contact">
                <i class="fa fa-plus" aria-hidden="true"></i> Thêm mới
            </a>
            <br/>
            <br/>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Hình ảnh</th>
                            <th style="width: 50%">Tên</th>
                            <th style="width: 15%">Giá</th>
                            <th style="width: 5%">Trạng thái</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($searchpro as $key => $item)
                                <tr>
                                    <td>{{ ($key+1) }}</td>
                                    <td>
                                        <img src={{ asset('assets/images/upload/product/'.$item->photo) }} style="cursor: zoom-in;" width="60px"/>
                                    </td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->regular_price }}</td>
                                    <td>
                                        @if ($item->status==1)
                                        <span style="color: rgb(9, 255, 0)" class="badge badge-success">Kích hoạt</span>
                                        @else
                                        <span style="color: red" class="badge badge-danger">Chưa kích hoạt</span>
                                        
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{route('admin.product.show',$item->slug) }}" ><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> Xem</button></a>
                                        <a href="{{route('admin.product.edit',$item->slug) }}"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Sửa</button></a>
                                        <a class="btn-delete" data-id="{{ $item->slug }}" data-type="product"><button class="btn btn-danger btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Xóa</button></a>
                                        {{-- <form method="GET" action="{{ route('admin.product.destroy',$item->slug) }}" accept-charset="UTF-8" style="display:inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" >Delete</button>
                                        </form> --}}
                                    </td>
                                </tr>
                            @endforeach
                    </tbody>
                </table>
                
            </div>
        </div>
    </div>
@endsection
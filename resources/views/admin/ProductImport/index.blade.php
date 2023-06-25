@extends('admin.app')
@section('title')
ProductImport
@endsection

@section('content')
    <div class="card">
        <div class="card-header" >
            <h4>Danh sách hóa đơn sản phẩm nhập</h4>
            @if(session('flash_message'))
                <div class="close-flash_message" style="color: green;font-size: 14px;">{{ session('flash_message') }}</div>
            @endif
            @if(session('flash_message1'))
                <div class="close-flash_message" style="color: red;font-size: 14px;">{{ session('flash_message1') }}</div>
            @endif
        </div>
        <div class="card-body">
            <a href="{{ route('admin.productimport.create') }}" class="btn btn-success btn-sm" title="Add New Contact">
                <i class="fa fa-plus" aria-hidden="true"></i> Thêm mới
            </a>
            <br/>
            <br/>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th >Mã hóa đơn nhập</th>
                            <th >Tên sản phẩm</th>
                            <th >Số lượng</th>
                            <th >Giá nhập</th>
                            <th >Tổng tiền</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($cthdnhap as $key => $item)
                                <tr>
                                    <td>{{ ($key+1) }}</td>
                                    <td>{{ $item->codeProductImport }}</td>
                                    <td>{{ $item->nameProduct }}</td>
                                    <td>{{ $item->quantity }}</td>
                                    <td>{{ $item->price }}</td>
                                    <td>{{ ($item->price)*($item->quantity) }}</td>
                                    <td>
                                        <a href="{{route('admin.productimport.show',$item->id) }}" ><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                        
                                    </td>
                                </tr>
                            @endforeach
                    </tbody>
                </table>
                <div class="paging-index">
                    {{ $cthdnhap->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
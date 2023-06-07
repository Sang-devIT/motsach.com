@extends('admin.app')
@section('title')
Category
@endsection

@section('content')
    <div class="card">
        <div class="card-header" >
            <h2>Danh sách loại sản phẩm</h2>
            @if(session('flash_message'))
                <div style="color: green;font-size: 14px;">{{ session('flash_message') }}</div>
            @endif
            @if(session('flash_message1'))
                <div style="color: red;font-size: 14px;">{{ session('flash_message1') }}</div>
            @endif
        </div>
        <div class="card-body">
            <a href="{{ route('admin.category.create') }}" class="btn btn-success btn-sm" title="Add New Contact">
                <i class="fa fa-plus" aria-hidden="true"></i> Thêm mới
            </a>
            <br/>
            <br/>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Tên</th>
                            <th>Trạng thái</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($category as $key => $item)
                                <tr>
                                    <td>{{ ($key+1) }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>
                                        @if ($item->status==1)
                                        <span style="color: rgb(9, 255, 0)" class="badge badge-success">Kích hoạt</span>
                                        @else
                                        <span style="color: red" class="badge badge-danger">Chưa kích hoạt</span>
                                        
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{route('admin.category.show',$item->id) }}" ><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                        <a href="{{route('admin.category.edit',$item->id) }}"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                                        <form method="GET" action="{{ route('admin.category.destroy',$item->id) }}" accept-charset="UTF-8" style="display:inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" >Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
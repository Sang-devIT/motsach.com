@extends('admin.app')
@section('title')
Banner
@endsection

@section('content')
    <div class="card">
        <div class="card-header" >
            <h2>Danh sách banner</h2>
            @if(session('flash_message'))
                <div style="color: green;font-size: 14px;">{{ session('flash_message') }}</div>
            @endif
            @if(session('flash_message1'))
                <div style="color: red;font-size: 14px;">{{ session('flash_message1') }}</div>
            @endif
        </div>
        <div class="card-body">
            <a href="{{ route('admin.banner.create') }}" class="btn btn-success btn-sm" title="Add New Contact">
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
                            <th>Tên banner</th>
                            <th style="width: 50%">Link</th>
                            <th style="width: 15%">Type</th>
                            <th style="width: 5%">Trạng thái</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($banner as $key => $item)
                                <tr>
                                    <td>{{ ($key+1) }}</td>
                                    <td>
                                        <img src={{ asset('assets/images/upload/banner/'.$item->photo) }} style="cursor: zoom-in;" width="100%" height="100px"/>
                                    </td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->link }}</td>
                                    <td>{{ $item->type }}</td>
                                    <td>
                                        @if ($item->status==1)
                                        <span style="color: rgb(9, 255, 0)" class="badge badge-success">Kích hoạt</span>
                                        @else
                                        <span style="color: red" class="badge badge-danger">Chưa kích hoạt</span>
                                        
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{route('admin.banner.edit',$item->id) }}"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                                        <form method="GET" action="{{ route('admin.banner.destroy',$item->id) }}" accept-charset="UTF-8" style="display:inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" >Delete</button>
                                        </form>
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
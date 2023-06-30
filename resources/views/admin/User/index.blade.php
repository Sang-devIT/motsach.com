@extends('admin.app')
@section('title')
User
@endsection

@section('content')
    <div class="card">
        <div class="card-header" >
            <h4>Danh sách tài khoản</h4>
            @if(session('flash_message'))
                <div class="close-flash_message" style="color: green;font-size: 14px;">{{ session('flash_message') }}</div>
            @endif
            @if(session('flash_message1'))
                <div class="close-flash_message" style="color: red;font-size: 14px;">{{ session('flash_message1') }}</div>
            @endif
        </div>
        <div class="card-body">
            <a href="{{ route('admin.product.create') }}" class="btn btn-success btn-sm d-xl-none" title="Add New Contact">
                <i class="fa fa-plus" aria-hidden="true"></i> Thêm mới
            </a>
            <br/>
            <br/>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th style="width: 50%">Tên</th>
                            <th style="width: 15%">email</th>
                            
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($user as $key => $item)
                                <tr>
                                    <td>{{ ($key+1) }}</td>
                                    
                                    <td>{{ $item->fullname }}</td>
                                    <td>{{ $item->email }}</td>
                                   
                                    <td>
                                        <a href="" ><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                        <form method="GET" action="{{ route('admin.user.destroy',$item->id) }}" accept-charset="UTF-8" style="display:inline">
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
                    {{ $user->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
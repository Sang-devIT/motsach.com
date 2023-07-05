@extends('admin.app')
@section('title')
Order
@endsection

@section('content')
<div class="card">
    <div class="card-header" >
        <h2>Danh sách đơn hàng</h2>
        @if(session('flash_message'))
            <div class="close-flash_message" style="color: green;font-size: 14px;">{{ session('flash_message') }}</div>
        @endif
    </div>
    <div class="card-body">
        
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Mã đơn hàng</th>
                        <th>Tên</th>
                        <th>Ngày đặt</th>
                        <th>Hình thức thanh toán</th>
                        <th>Trạng thái</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($order as $key => $item)
                            <tr>
                                <td>{{ ($key+1) }}</td>
                                <td>{{ $item->order_code }}</td>
                                <td>{{ $item->fullname }}</td>
                                <td>{{ $item->order_date }}</td>
                                <td>
                                    @switch($item->status)
                                        @case(1)
                                            Tiền mặt
                                            @break
                                        @case(2)
                                            Chuyển khoản
                                            @break
                                        @default
                                            Ship Code
                                    @endswitch
                                </td>
                                <td>
                                    @switch($item->status)
                                        @case(1)
                                            Đã đặt
                                            @break
                                        @case(2)
                                            Đang giao
                                            @break
                                        @case(3)
                                            Đã giao
                                            @break
                                        @default
                                            Đã hủy
                                    @endswitch
                                </td>
                                <td>
                                    <a href="{{route('admin.order.edit',$item->id) }}"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                                    {{-- <form method="GET" action="{{ route('admin.order.destroy',$item->id) }}" accept-charset="UTF-8" style="display:inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" >Delete</button>
                                    </form> --}}
                                </td>
                            </tr>
                        @endforeach
                </tbody>
            </table>
            {{-- <div class="paging-index">
                {{ $author->links() }}
            </div> --}}
        </div>
    </div>
</div>
@endsection
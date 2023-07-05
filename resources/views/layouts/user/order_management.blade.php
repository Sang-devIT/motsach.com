@extends('layouts.app')

@section('content')
<div class="container">
    <div class="home-page-accout">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-lg-3 col-left-ac">
                <div class="block-account">
                
                    <h5 class="title-account">Trang tài khoản</h5>
                
                    <p>Xin chào, <span style="color:#ef4339;">{{Session::get('customers')->fullname}}</span>&nbsp;!</p>
                
                    <ul>
                
                        <li>
                
                            <a disabled="disabled" class="title-info " href="{{route('user.account_management')}}">
                
                                <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"></path></svg>
                
                
                
                                <span>Thông tin tài khoản</span>
                
                            </a>
                
                        </li>
                
                        <li>
                
                            <a class="title-info  " href="{{route('user.order_management')}}">
                
                                <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M13 12h7v1.5h-7zm0-2.5h7V11h-7zm0 5h7V16h-7zM21 4H3c-1.1 0-2 .9-2 2v13c0 1.1.9 2 2 2h18c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 15h-9V6h9v13z"></path></svg>
                
                                <span>Quản lý đơn hàng</span>
                
                            </a>
                
                        </li>
                
                    </ul>
                
                </div>
                
                </div>
            <div class="col-12 col-md-9 mb-4 Account__StyledAccountLayoutInner">
            <div class="styles__StyledAccountListOrder-sc-6t66uv-0 glOjBk">
                @if(session('success'))
                    <div class="close-success" style="color: green;font-size: 14px;">{{ session('success') }}</div>
                @endif
                    <div class="heading">Đơn hàng của tôi</div>
                    <div class="inner inner-scroll">
                        <table>
                            <thead>
                                <tr>
                                    <th>Mã đơn hàng</th>
                                    <th>Ngày mua</th>
                                    <th>Sản phẩm</th>
                                    <th>Giá</th>
                                    <th>Trạng thái đơn hàng</th>
                                </tr>
                            </thead>
                            <tbody>
                        <?php foreach ($getOrder as $v) {?>
                        <tr>
                            <td>
                                {{ $v->order_code }}
                            </td>
                            <td>
                                {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $v->order_date)->format('d/m/Y') }}
                            </td>
                            <td>
                                {{ $v->nameProduct }}
                            </td>
                            <td>
                                {{ $v->price }}
                            </td>
                            <td>
                                @switch($v->status)
                                    @case(1)
                                        Đã đặt
                                        @break
                                    @case(2)
                                        Đang giao
                                        @break
                                    @case(2)
                                        Đã giao
                                        @break
                                    @default
                                        Đã hủy
                                @endswitch
                            </td>
                            <?php /*<td><?=$row_order[0]['name']?><?php if(count($row_order)>1){echo '... và '.(count($row_order)-1).' sản phẩm khác';} ?></td>
                            <td><?=$func->formatMoney($v['total_price'],' ₫')?></td>
                            <td><?=$row_tinhtrang['namevi']?></td>*/?>
                        </tr>  
                        <?php }?>
                            </tbody>
                        </table>
                    </div>
            </div>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('layouts.app')

@section('content')
<?php /*?>
<div class="breadcrumb-section breadcrumb-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="breadcrumb-text">
						<p>Thông tin tài khoản</p>
						<h1>user</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end breadcrumb section -->
<div class="container mt-4">
    <div class="row">
        <div class="col-lg-3 my-lg-0 my-md-1">
            <div id="sidebar" class="bg-purple">
                <div class="h4 text-white">Tài khoản</div>
                <ul>
                    <li >
                         <a href="{{route('user.account_management')}}" class="text-decoration-none d-flex align-items-start">
                            <div class="fas fa-box pt-2 me-3"></div>
                            <div class="d-flex flex-column">
                                <div class="link">Tài khoản của tôi</div>
                                <div class="link-desc">Xem và quản lí tài khoản</div>
                            </div>
                        </a>
                     </li>
                    <li> 
                        <a href="{{route('user.order_management')}}" class="text-decoration-none d-flex align-items-start">
                            <div class="fas fa-box-open pt-2 me-3"></div>
                            <div class="d-flex flex-column">
                                <div class="link">Đơn hàng của tôi</div>
                                <div class="link-desc">Xem và quản lí đơn hàng</div>
                            </div>
                        </a> 
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-lg-9 my-lg-0 my-1">
            <div id="main-content" class="bg-white border">
            <div class="container rounded bg-white mt-5 mb-5">
    <div class="row">
        <div class="col-md-3 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5">
               
                <span class="font-weight-bold">{{Session::get('customers')->fullname}}</span>
                <span class="text-black-50">{{Session::get('customers')->email}}</span>
                <span> </span>
            </div>
        </div>
        <div class="col-md-8 border-right">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Thiết lập hồ sơ</h4>
                </div>
                <form action="{{route('user.edit_account')}}" method="POST" enctype="multipart/form-data">
               @csrf
                    <div class="row mt-2">
                        <div class="col-md-6">
                            <label class="labels">Họ tên</label>
                            <input type="text" class="form-control" name="fullname"value="{{Session::get('customers')->fullname}}">
                        </div>
                      
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12">
                            <label class="labels">Số điện thoại</label>
                            <input type="text" class="form-control"name="phone" value="{{Session::get('customers')->phone}}">
                        </div>
                        <div class="col-md-12">
                            <label class="labels">Địa chỉ </label>
                            <input type="text" class="form-control"name="address"value="{{Session::get('customers')->address}}">
                        </div>
                    
                    </div>
                    
                    <div class="mt-5 text-center">
                        <button class="btn btn-primary profile-button" type="submit">Lưu thông tin</button>
                    </div>
                </form>
            </div>
        </div>
       
    </div>
</div>
            </div>
        </div>
    </div>
</div>

    </div>
</div>
<div style="height:5%"></div>
<?php */?>
<div class="container">
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

            <a class="title-info  " href="account/order">

                <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M13 12h7v1.5h-7zm0-2.5h7V11h-7zm0 5h7V16h-7zM21 4H3c-1.1 0-2 .9-2 2v13c0 1.1.9 2 2 2h18c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 15h-9V6h9v13z"></path></svg>

                <span>Quản lý đơn hàng</span>

            </a>

        </li>

    </ul>

</div>

</div>

<div class="col-xs-12 col-sm-12 col-lg-9 col-right-ac">

          <div class=" mb-4 Account__StyledAccountLayoutInner">

   <h3 class="styles__StyledHeading jZJmua">Thông tin tài khoản</h3>

   <div class="styles__StyledAccountInfo irgDVD">
    @if(session('flash_message'))
        <div class="close-flash_message" style="color: green;font-size: 14px;">{{ session('flash_message') }}</div>
    @endif
   <form action="{{route('user.edit_account')}}" method="POST" enctype="multipart/form-data">
               @csrf

           <div class="form-control ">

                <label class="input-label">Họ tên</label>

                <div>

                    <input type="text" id="fullname" name="fullname" maxlength="128" class="Input-sc-17i9bto-0 bYlDgr" value="{{Session::get('customers')->fullname}}">

                </div>

            </div>

            <div class="form-control ">

                <label class="input-label">Điện thoại</label>

                <div>

                    <input type="tel" id="phone" name="phone" placeholder="Hãy nhập SĐT để trải nghiệm tốt hơn" class="Input-sc-17i9bto-0 bYlDgr" value="{{Session::get('customers')->phone}}">

                </div>

            </div>

            <div class="form-control ">

                <label class="input-label">Email</label>

                <div>

                    <input type="text" disabled="" id="email" name="email" class="Input-sc-17i9bto-0 bYlDgr" value="{{Session::get('customers')->email}}">

                </div>

            </div>
            <div class="form-control ">

            <label class="input-label">Địa chỉ</label>

            <div>

                <input type="text" id="address" name="address" class="Input-sc-17i9bto-0 bYlDgr" value="{{Session::get('customers')->address}}">

            </div>

            </div>

           

            <div class="form-control">
                <label class="input-label">&nbsp;</label>
                <button type="submit" name="info-user" class="btn-submit" >Cập nhật</button>
            </div>

       </form>

   </div>

</div>

</div>

</div>
</div>
@endsection
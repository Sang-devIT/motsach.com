@extends('layouts.app')
@section('content')
    <div class="wrap_background_aside  page_login">
        <div class="wrap_background_aside">
            <div class="row">
                <div style="    margin: auto;" class="col-lg-4 col-md-6 col-sm-12 col-12 col-xl-4 offset-xl-4 offset-lg-4 offset-md-3 offset-xl-3">
                    <div class="row no-margin align-items-center" style="background: #fff;border-radius: 5px;">
                        <div class=" page-login pagecustome clearfix no-padding">
                            <div class="wpx">
                                <ul class="auth-block__menu-list">
                                    <li>
                                        <a href="{{route('user.login')}}" title="Đăng nhập">Đăng nhập</a>
                                    </li>
                                    <li class="active">
                                        <a href="#" title="Đăng ký">Đăng ký</a>
                                    </li>
                                </ul>
                                <h1 class="title_heads a-center"><span>Đăng ký</span></h1>
                                <div id="login" class="section">
                                <form action="{{route('user.register.post')}}" method="POST" role="form" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-signup " style="color:red;" >     
                                    </div>
                                    <div class="form-signup clearfix">
                                        <div class="row">
                                            <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                                                <fieldset class="form-group">
                                                    <input type="text" class="form-control form-control-lg" value="" id="fullname" name="fullname"  placeholder="Họ tên" required >
                                                </fieldset>
                                            </div>                                              
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                                                <fieldset class="form-group">
                                                    <input type="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,63}$" class="form-control form-control-lg"  value="" id="email" name="email"  placeholder="Email" required="">
                                                    @if(!empty(Session::get('error-email')))
                                                        <span style="color:red">Email đã được sử dụng</span>
                                                    @endif
                                                </fieldset>
                                            </div>
                                            <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                                                <fieldset class="form-group">   
                                                    <input placeholder="Số điện thoại" type="phone" pattern="\d+" class="form-control form-control-comment form-control-lg" id="phone" name="phone" Required>
                                                </fieldset>
                                            </div>
                                            <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                                                <fieldset class="form-group">
                                                    <input type="text" class="form-control form-control-lg" value="" id="address" name="address"  placeholder="Địa chỉ" required >
                                                </fieldset>
                                            </div>
                                            <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                                                <fieldset class="form-group">
                                                    <input type="password" class="form-control form-control-lg" value="" name="password" id="password" placeholder="Mật khẩu" required >
                                                   
                                                
                                                </fieldset>
                                            </div>
                                            <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                                                <fieldset class="form-group">
                                                    <input type="password" class="form-control form-control-lg" value="" id="passwordConfirm" name="passwordConfirm" placeholder="Nhập lại mật khẩu" required >
                                                    @if(!empty(Session::get('error-password')))
                                                        <span style="color:red">Mật khẩu không trùng khớp</span>
                                                    @endif    
                                                    <?php session()->forget('error-password');?>   
                                                </fieldset>
                                            </div>
                                        </div>
                                        <div class="section">
                                            <!-- <button type="submit" name="registration-user" value="Đăng ký" class="btn  btn-style btn_50">Đăng ký</button> -->
                                            <input type="submit" class="btn  btn-style btn_50"  value="Register"/>
                                        </div>
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
@endsection
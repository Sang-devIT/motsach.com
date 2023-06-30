@extends('layouts.app')

@section('content')

    <div class="wrap_background_aside page_login">
        <div class="row">
            <div style="margin: auto;" class="col-lg-4 col-md-6 col-sm-12 col-12 col-xl-4 offset-xl-4 offset-lg-4 offset-md-3 offset-xl-3 ">
                <div class="row no-margin align-items-center" style="background: #fff;border-radius: 5px;">
                    <div class="page-login pagecustome clearfix no-padding">
                        <div class="wpx">
                            <ul class="auth-block__menu-list">
                                <li class="active">
                                    <a href="#" title="Đăng nhập">Đăng nhập</a>
                                </li>
                                <li>
                                    <a href="{{route('user.register')}}" title="Đăng ký">Đăng ký</a>
                                </li>
                            </ul>
                            <h1 class="title_heads a-center"><span>Đăng nhập</span></h1>
                            <div id="login" class="section">
                            <form class="login100-form validate-form" action="{{ route('user.login.post') }}"method="POST" role="form">
                                @csrf
                                <span class="form-signup" style="color:red;">
                                </span>
                                <div class="form-signup clearfix">
                                    <fieldset class="form-group">
                                        <input type="text" class="form-control form-control-lg" value="" id="email" name="email" placeholder="Email" Required>
                                    </fieldset>
                                    <fieldset class="form-group">
                                        <input type="password" class="form-control form-control-lg" value="" id="password" name="password" placeholder="Mật khẩu" Required>
                                    </fieldset>
                                    <div class="checkbox-user custom-control custom-checkbox d-xl-none">
                                        <input type="checkbox" class="custom-control-input" name="remember-user" id="remember-user" value="1">
                                        <label class="custom-control-label" for="remember-user">nhomatkhau</label>
                                    </div>
                                        @if(session()->has('error'))
                                            <div class="box-eror-login" style="color:red;">
                                                {{ session()->get('error') }}
                                            </div>
                                        @endif
                                    <div class="pull-xs-left">
                                        <button class="btn btn-style btn_50">Đăng nhập</button>
                                    </div>
                                    <!-- <span class="block a-center quenmk">Quên mật khẩu</span> -->
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
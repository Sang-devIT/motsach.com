
<header class="header">
    <div class="tg-topbar">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <!--  <ul class="tg-addnav">
                        <li>
                            <a href="javascript:void(0);">
                                <i class="icon-envelope"></i>
                                <em>Liên hệ</em>
                            </a>
                        </li>
                        
                    </ul>
                    <div class="dropdown tg-themedropdown tg-currencydropdown">
                        <a href="javascript:void(0);" id="tg-currenty" class="tg-btnthemedropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="icon-earth"></i>
                            <span>Currency</span>
                        </a>
                        <ul class="dropdown-menu tg-themedropdownmenu" aria-labelledby="tg-currenty">
                            <li>
                                <a href="javascript:void(0);">
                                    <i>£</i>
                                    <span>British Pound</span>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0);">
                                    <i>$</i>
                                    <span>Us Dollar</span>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0);">
                                    <i>€</i>
                                    <span>Euro</span>
                                </a>
                            </li>
                        </ul>
                    </div> -->
                    
                </div>
            </div>
        </div>
    </div>
    <div class="tg-middlecontainer">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <strong class="tg-logo"><a href="{{route('index')}}"><img src="{{asset('frontend/images/logo.png')}}" alt="company name here"></a></strong>
                    <div class="tg-wishlistandcart">
                        <div class="dropdown d-xl-none tg-themedropdown tg-wishlistdropdown">
                            <a href="javascript:void(0);" id="tg-wishlisst" class="tg-btnthemedropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="tg-themebadge">3</span>
                                <i class="icon-heart"></i>
                                <span>Yêu thích</span>
                            </a>
                            <div class="dropdown-menu tg-themedropdownmenu" aria-labelledby="tg-wishlisst">
                                <div class="tg-description"><p>No products were added to the wishlist!</p></div>
                            </div>
                        </div>
                        
                        <div class="header-control">
                            <ul class="ul-control">
                                <li class="header-account d-lg-flex ">
                                    <img src="{{asset('frontend/images/user.png')}}">
                                
                                    <ul>
                                        @if(Session::get('customers') != null)			
                                            <li>
                                                <a href="{{route('user.account_management')}}">
                                                    <span>Hi, {{Session::get('customers')->fullname}}</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{route('user.logout')}}">
                                                    <i class="fas fa-sign-out-alt"></i>
                                                    <span>Đăng xuất</span>
                                                </a>
                                            </li>
                                            @endif
                                        @if(Session::get('customers') == null)
                                            <li>
                                                <a href="{{route('user.register')}}">
                                                    <span>Đăng ký</span>
                                                    <i class="bi bi-person-plus"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{route('user.login')}}">
                                                    <span>Đăng nhập</span>
                                                    <i class="bi bi-box-arrow-in-right"></i>
                                                </a>
                                            </li>
                                        @endif
                                    </ul>
                                </li>
                                <li class="header-cart block-cart">
                                    <a  class="icon" href="gio-hang" title="Giỏ hàng">
                                        <img src="{{asset('frontend/images/cart.png')}}">
                                        <div class="gh">Giỏ hàng</div>
                                        <div class="count-cart"> 0</div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="tg-searchbox">
                        <form class="tg-formtheme tg-formsearch" action="{{route('product.search.pro')}}" method="GET" role="search">
                            <fieldset>
                                <input type="text" name="search" class="typeahead form-control" placeholder="Tìm kiếm Sách, tác giả, từ khóa,...">
                                <button type="submit"><i class="icon-magnifier"></i></button>
                            </fieldset>
                            <!-- <a href="javascript:void(0);">+  Advanced Search</a> -->
                        </form>
                    </div>
                   
                </div>
            </div>
        </div>
    </div>
</header>
    

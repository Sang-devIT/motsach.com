<div class="tg-navigationarea w-menu">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <nav id="tg-nav" class="tg-nav">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#tg-navigation" aria-expanded="false">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                        <div id="tg-navigation" class="collapse navbar-collapse tg-navigation">
                            <ul>
                                <li class="">
                                    <a href="/">Trang chủ</a>
                                   
                                </li>
                                <li class="">
                                    <a href="{{route('product')}}">Sản phẩm</a>
                                </li>
                                <li class="menu-item-has-children ">
                                    <a href="javascript:void(0);">Thể loại sản phẩm </a>
                                    <ul class="sub-menu">
                                        @foreach($catmenu as $k => $v)
                                            <li><a href="{{route('product.showcategory',$v->id)}}">{{$v->name}}</a></li>
                                        @endforeach
                                    </ul>
                                </li>
                                
                                <li class="menu-item-has-children">
                                    <a href="javascript:void(0);">Tác giả</a>
                                    <ul class="sub-menu">
                                        @foreach($authormenu as $k => $v)
                                            <li><a href="{{route('product.showauthor',$v->id)}}">{{$v->name}}</a></li>
                                        @endforeach
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
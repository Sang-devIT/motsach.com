@extends('layouts.app')

@section('content')
	<div class="tg-innerbanner tg-haslayout tg-parallax tg-bginnerbanner" data-z-index="-100" data-appear-top-offset="600" data-parallax="scroll" data-image-src="{{asset('frontend/images/parallax/bgparallax-07.jpg')}}">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<div class="tg-innerbannercontent">
						<h1>Thể loại</h1>
						<ol class="tg-breadcrumb">
							<li><a href="">Trang chủ</a></li>
							<li class="{{route('product')}}">Sản phẩm</li>
                            <li class=""></li>
						</ol>
                   
					</div>
				</div>
			</div>
		</div>
	</div>
	<main id="tg-main" class="tg-main tg-haslayout">
			<!--************************************
					News Grid Start
			*************************************-->
			<div class="tg-sectionspace tg-haslayout">
				<div class="container">
					<div class="row">
						<div id="tg-twocolumns" class="tg-twocolumns">
							<div class="col-xs-12 col-sm-8 col-md-8 col-lg-9 pull-right">
								<div id="tg-content" class="tg-content">
									<div class="tg-products">
										<div class="tg-sectionhead d-xl-none">
											<h2><span>People’s Choice</span>Bestselling Books</h2>
										</div>
										<div class="tg-featurebook alert d-xl-none" role="alert">
											<button type="button" class="close" data-dismiss="alert" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
											<div class="tg-featureditm">
												<div class="row">
													<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 hidden-sm hidden-xs">
														<figure><img src="images/img-04.png" alt="image description"></figure>
													</div>
													<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
														<div class="tg-featureditmcontent">
															<div class="tg-themetagbox"><span class="tg-themetag">featured</span></div>
															<div class="tg-booktitle">
																<h3><a href="javascript:void(0);">Things To Know About Green Flat Design</a></h3>
															</div>
															<span class="tg-bookwriter">By: <a href="javascript:void(0);">Farrah Whisenhunt</a></span>
															<span class="tg-stars"><span></span></span>
															<div class="tg-priceandbtn">
																<span class="tg-bookprice">
																	<ins>$23.18</ins>
																	<del>$30.20</del>
																</span>
																<a class="tg-btn tg-btnstyletwo tg-active" href="javascript:void(0);">
																	<i class="fa fa-shopping-basket"></i>
																	<em>Add To Basket</em>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="tg-productgrid">
											<div class="tg-refinesearch d-xl-none">
												<span>showing 1 to 8 of 20 total</span>
												<form class="tg-formtheme tg-formsortshoitems">
													<fieldset>
														<div class="form-group">
															<label>sort by:</label>
															<span class="tg-select">
																<select>
																	<option>name</option>
																	<option>name</option>
																	<option>name</option>
																</select>
															</span>
														</div>
														<div class="form-group">
															<label>show:</label>
															<span class="tg-select">
																<select>
																	<option>8</option>
																	<option>16</option>
																	<option>20</option>
																</select>
															</span>
														</div>
													</fieldset>
												</form>
											</div>
											<?php if(count($product)==0){?>
												<div class="thongbaoccsn">Chưa có sản phẩm </div>
												<?php }?>
											@foreach($product as $key => $item)
											<div class="col-xs-6 col-sm-6 col-md-4 col-lg-3">
												<div class="tg-postbook">
													<figure class="tg-featureimg">
														<div class="tg-bookimg">
															<div class="tg-frontcover"><img src="{{ asset('assets/images/upload/product/'.$item->photo) }}" alt="image description"></div>
															<div class="tg-backcover"><img src="{{ asset('assets/images/upload/product/'.$item->photo) }}" alt="image description"></div>
														</div>
														<?php if($item->stock == 0){?>
															<span class="hethang"><img src="{{asset('frontend/images/hethang.png')}}" alt=""></span>
														<?php }?>
														<a class="tg-btnaddtowishlist d-xl-none" href="javascript:void(0);">
															<i class="icon-heart"></i>
															<span>add to wishlist</span>
														</a>
													</figure>
													<div class="tg-postbookcontent">
														<ul class="tg-bookscategories d-xl-none">
															<li><a href="javascript:void(0);">Art &amp; Photography</a></li>
														</ul>
														<div class="tg-themetagbox d-xl-none"><span class="tg-themetag">sale</span></div>
														<div class="tg-booktitle">
															<h3><a href="{{route('product.detail',$item->slug) }}">{{ $item->name }}</a></h3>
														</div>
														<span class="tg-bookwriter">Tác giả:{{$item->nameAuthor}}</span>
														<!-- <span class="tg-stars"><span></span></span> -->
														<span class="tg-bookprice">
															<ins>{{ number_format($item->regular_price,0,',',',') }} VNĐ</ins>
															<del class="d-xl-none">$27.20</del>
														</span>
														<?php if($item->stock == 0 || ktraSLT($item->stock,$item->id) == $item->stock){?>
															<a class="tg-btn tg-btnstyletwo" style="opacity: .5;">
																<i class="fa fa-shopping-basket"></i>
																<em>Thêm vào giỏ hàng </em>
															</a>
														<?php }else{?>
															<a class="tg-btn tg-btnstyletwo" href="{{ route('order.addtocart1', $item->id) }}">
																<i class="fa fa-shopping-basket"></i>
																<em>Thêm vào giỏ hàng </em>
															</a>
														<?php }?>
													</div>
												</div>
											</div>
											@endforeach
										
										</div>
										
									</div>
								</div>
							</div>
							<div class="col-xs-12 col-sm-4 col-md-4 col-lg-3 pull-left">
								<aside id="tg-sidebar" class="tg-sidebar">
									<div class="tg-widget tg-widgetsearch d-xl-none">
										<form class="tg-formtheme tg-formsearch">
											<div class="form-group">
												<button type="submit"><i class="icon-magnifier"></i></button>
												<input type="search" name="search" class="form-group" placeholder="Search by title, author, key...">
											</div>
										</form>
									</div>
									<div class="tg-widget tg-catagories">
										<div class="tg-widgettitle">
											<h3>Thể loại</h3>
										</div>
										<div class="tg-widgetcontent">
											<ul>
												@foreach($category as $k => $v)
												<li><a href="{{route('product.showcategory',$v->id)}}"><span>{{$v->name}}</span><em>
													
												{{(!empty($v->count)) ? "$v->count":"0"}}</em></a></li>	
												@endforeach
												<li class="d-xl-none"><a href="javascript:void(0);"><span>View All</span><em>28245</em></a></li>

											</ul>
										</div>
									</div>
                                   
                                    <div class="tg-widget tg-catagories">
										<div class="tg-widgettitle">
											<h3>Tác giả</h3>
										</div>
										<div class="tg-widgetcontent">
											<ul>
												@foreach($author as $k => $v)
												<li><a href="{{route('product.showauthor',$v->id)}}"><span>{{$v->name}}</span><em>
													
												{{(!empty($v->count)) ? "$v->count":"0"}}</em></a></li>	
												@endforeach

											</ul>
										</div>
									</div>
									
									
								</aside>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!--************************************
					News Grid End
			*************************************-->
		</main>
@endsection
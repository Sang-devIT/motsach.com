@extends('layouts.app')

@section('content')
	<div class="tg-innerbanner tg-haslayout tg-parallax tg-bginnerbanner" data-z-index="-100" data-appear-top-offset="600" data-parallax="scroll" data-image-src="{{asset('frontend/images/parallax/bgparallax-07.jpg')}}">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<div class="tg-innerbannercontent">
						<h1>Tìm kiếm</h1>
						<ol class="tg-breadcrumb">
							<li><a href="javascript:void(0);">Trang chủ</a></li>
							<li class="tg-active">Tìm kiếm</li>
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
							<div class="col-xs-12 pull-right">
								<div id="tg-content" class="tg-content">
									<div class="tg-products">
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
											@foreach($searchpro as $key => $item)
											<div class="col-xs-6 col-sm-6 col-md-4 col-lg-3">
												<div class="tg-postbook">
													<figure class="tg-featureimg">
														<div class="tg-bookimg">
															<div class="tg-frontcover"><img src="{{ asset('assets/images/upload/product/'.$item->photo) }}" alt="image description"></div>
															<div class="tg-backcover"><img src="{{ asset('assets/images/upload/product/'.$item->photo) }}" alt="image description"></div>
														</div>
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
													
														<!-- <span class="tg-stars"><span></span></span> -->
														<span class="tg-bookprice">
															<ins>{{ $item->regular_price }}</ins>
															<del class="d-xl-none">$27.20</del>
														</span>
														<a class="tg-btn tg-btnstyletwo" href="{{ route('order.addtocart1', $item->id) }}">
															<i class="fa fa-shopping-basket"></i>
															<em>Thêm vào giỏ hàng</em>
														</a>
													</div>
												</div>
											</div>
											@endforeach

										</div>
                                        
									</div>
                                   
								</div>
							</div>
                            
						</div>
					</div>
                    <?php /*<div style="margin:auto">
                        {{ $searchproduct->links() }}
                    </div>
                    */?>
				</div>
			</div>
			<!--************************************
					News Grid End
			*************************************-->
		</main>
@endsection
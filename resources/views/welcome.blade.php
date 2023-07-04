
@extends('layouts.app')

@section('content')
	<?php /*?>
	<section class="tg-sectionspace tg-haslayout">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<div class="tg-sectionhead">
						<h2><span>Sự lựa chọn của mọi người</span>Sách bán chạy</h2>
						<a class="tg-btn" href="javascript:void(0);">Xem tất cả</a>
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<div id="tg-bestsellingbooksslider" class="tg-bestsellingbooksslider tg-bestsellingbooks owl-carousel">

					@foreach($product as $key => $item)
						<div class="item">
							<div class="tg-postbook">
								<figure class="tg-featureimg">
									<div class="tg-bookimg">
										<div class="tg-frontcover"><img src="{{ asset('assets/images/upload/product/'.$item->photo) }}" alt="image description"></div>
										<div class="tg-backcover"><img src="{{ asset('assets/images/upload/product/'.$item->photo) }}" alt="image description"></div>
									</div>
									<a class="tg-btnaddtowishlist d-xl-none" href="javascript:void(0);">
										<i class="icon-heart"></i>
										<span>Thêm vào yêu thích</span>
									</a>
								</figure>
								<div class="tg-postbookcontent">
									<ul class="tg-bookscategories d-xl-none">
										<li><a href="javascript:void(0);">Adventure</a></li>
										<li><a href="javascript:void(0);">Fun</a></li>
									</ul>
									<div class="tg-themetagbox d-xl-none"><span class="tg-themetag">sale</span></div>
									<div class="tg-booktitle">
										<h3><a href="javascript:void(0);">{{ $item->name }}</a></h3>
									</div>
									<span class="tg-bookwriter">Tác giả:{{$item->nameAuthor}}</span>
									
									<span class="tg-bookprice">
										<ins>{{ $item->regular_price }}</ins>
										<del class="d-xl-none">$27.20</del>
									</span>
									<a class="tg-btn tg-btnstyletwo" href="javascript:void(0);">
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
	</section>
	<?php */?>
		<section class=" tg-haslayout">
			<div class="container">
				@include('layouts.pages.slide')
			</div>
		</section>
	<!--************************************
			Best Selling End
	*************************************-->
	<section class="wrap-tatca tg-haslayout">
		<div class="container">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<div class="tg-sectionhead">
					<h2><span>Sự lựa chọn của mọi người</span>Tất cả sách</h2>
					 <a class="tg-btn" href="{{route('product')}}">Xem tất cả</a> 
				</div>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<div class="row">
					@foreach($product as $key => $item)
						<div class="col-6 col-sm-3 col-lg-2">
							<div class="item">
								<div class="tg-postbook">
									<figure class="tg-featureimg">
										<div class="tg-bookimg">
											<div class="tg-frontcover"><img src="{{ asset('assets/images/upload/product/'.$item->photo) }}" alt="image description"></div>
											<div class="tg-backcover"><img src="{{ asset('assets/images/upload/product/'.$item->photo) }}" alt="image description"></div>
										</div>
										<a class="tg-btnaddtowishlist d-xl-none" href="javascript:void(0);">
											<i class="icon-heart"></i>
											<span>Thêm vào yêu thích</span>
										</a>
									</figure>
									<div class="tg-postbookcontent">
										<div class="tg-booktitle">
											<h3><a href="{{route('product.detail',$item->slug) }}">{{ $item->name }}</a></h3>
										</div>
										<span class="tg-bookwriter">Tác giả:{{$item->nameAuthor}}</span>
										
										<span class="tg-bookprice">
											<ins>{{ $item->regular_price }}</ins>
											<del class="d-xl-none">$27.20</del>
										</span>
										<a class="tg-btn tg-btnstyletwo" href="{{ route('order.addtocart', $item->id) }}">
											<i class="fa fa-shopping-basket"></i>
											<em>Thêm vào giỏ hàng </em>
										</a>
									</div>
								</div>
							</div>
						</div>
					@endforeach
				</div>
			</div>
		</div>
	</section>
	<!--************************************
			Featured Item Start
	*************************************-->
	<section class="tg-bglight tg-haslayout">
		<div class="container">
			<div class="row">
				<div class="tg-featureditm">
					<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 hidden-sm hidden-xs">
						<figure><img src="{{asset('frontend/images/img-02.png')}}" alt="image description"></figure>
					</div>
					<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
						<div class="tg-featureditmcontent">
							<div class="tg-themetagbox d-xl-none"><span class="tg-themetag">featured</span></div>
							<div class="tg-booktitle">
								<h3><a href="javascript:void(0);">Những Điều Cần Biết Về Thiết Kế Phẳng Xanh</a></h3>
							</div>
							<span class="tg-bookwriter">Tác giả : <a href="javascript:void(0);">Thích Nhất Hạnh</a></span>
							<div class="tg-priceandbtn">
								<span class="tg-bookprice">
									<ins>59.180vnđ</ins>
									<del class="d-xl-none">$30.20</del>
								</span>
								<a class="tg-btn tg-btnstyletwo tg-active" href="javascript:void(0);">
									<i class="fa fa-shopping-basket"></i>
									<em>Thêm vào giỏ hàng</em>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--************************************
			Featured Item End
	*************************************-->
	<!--************************************
			New Release Start
	*************************************-->
	<section class="tg-sectionspace tg-haslayout">
		<div class="container">
			<div class="row">
				<div class="tg-newrelease">
					<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
						<div class="tg-sectionhead">
							<h2><span>Hương vị gia vị mới</span>Sách mới phát hành</h2>
						</div>
						<div class="tg-description">
							<p>Có thể tăng thu nhập của người sử dụng lao động, nhưng trong cùng một khoảng thời gian, một số lao động có thể chấp nhận được sẽ xảy ra. Vì tôi xin nói đến từng chi tiết nhỏ nhất, không ai nên tập bất cứ loại bài tập nào, trừ khi nó thuận lợi cho kết quả, nếu không cơn đau sẽ nắm lấy nó, và sợi lông sẽ bay mất.</p>
						</div>
						<div class="tg-btns ">
							<a class="tg-btn tg-active d-xl-none" href="javascript:void(0);">Xem tất cả</a>
							<a class="tg-btn" href="javascript:void(0);">Xem tất cả</a>
						</div>
					</div>
					<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
						<div class="row">
							<div class="tg-newreleasebooks">

							@foreach($product as $key => $item)
								<div class="col-xs-4 col-sm-4 col-md-6 col-lg-4">
									<div class="tg-postbook">
										<figure class="tg-featureimg">
											<div class="tg-bookimg">
												<div class="tg-frontcover"><img src="{{ asset('assets/images/upload/product/'.$item->photo) }}" alt="image description"></div>
												<div class="tg-backcover"><img src="{{ asset('assets/images/upload/product/'.$item->photo) }}" alt="image description"></div>
											</div>
											<a class="tg-btnaddtowishlist" href="javascript:void(0);">
												<i class="icon-heart"></i>
												<span>Thêm vào giỏ hàng</span>
											</a>
										</figure>
										<div class="tg-postbookcontent">

											<div class="tg-booktitle">
											<h3><a href="{{route('product.detail',$item->slug) }}">{{ $item->name }}</a></h3>
											</div>
											<span class="tg-bookwriter">Tác giả: <a href="javascript:void(0);">{{$item->nameAuthor}}</a></span>
										
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
	</section>
	<!--************************************
			New Release End
	*************************************-->
	<!--************************************
			Collection Count Start
	*************************************-->
	<section class="tg-parallax tg-bgcollectioncount tg-haslayout" data-z-index="-100" data-appear-top-offset="600" data-parallax="scroll" data-image-src="{{asset('frontend/images/parallax/bgparallax-04.jpg')}}">
		<div class="tg-sectionspace tg-collectioncount tg-haslayout">
			<div class="container">
				<div class="row">
					<div id="tg-collectioncounters" class="tg-collectioncounters">
						<div class="tg-collectioncounter tg-drama">
							<div class="tg-collectioncountericon">
								<i class="icon-bubble"></i>
							</div>
							<div class="tg-titlepluscounter">
								<h2>Kịch</h2>
								<h3 data-from="0" data-to="6179213" data-speed="8000" data-refresh-interval="50">6,179,213</h3>
							</div>
						</div>
						<div class="tg-collectioncounter tg-horror">
							<div class="tg-collectioncountericon">
								<i class="icon-heart-pulse"></i>
							</div>
							<div class="tg-titlepluscounter">
								<h2>Kinh dị</h2>
								<h3 data-from="0" data-to="3121242" data-speed="8000" data-refresh-interval="50">3,121,242</h3>
							</div>
						</div>
						<div class="tg-collectioncounter tg-romance">
							<div class="tg-collectioncountericon">
								<i class="icon-heart"></i>
							</div>
							<div class="tg-titlepluscounter">
								<h2>Lãng mạn</h2>
								<h3 data-from="0" data-to="2101012" data-speed="8000" data-refresh-interval="50">2,101,012</h3>
							</div>
						</div>
						<div class="tg-collectioncounter tg-fashion">
							<div class="tg-collectioncountericon">
								<i class="icon-star"></i>
							</div>
							<div class="tg-titlepluscounter">
								<h2>Thời trang</h2>
								<h3 data-from="0" data-to="1158245" data-speed="8000" data-refresh-interval="50">1,158,245</h3>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--************************************
			Collection Count End
	*************************************-->
	<!--************************************
			Picked By Author Start
	*************************************-->
	<section class="tg-sectionspace tg-haslayout">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<div class="tg-sectionhead">
						<h2><span>Một số cuốn sách hay</span>Được viết bởi các tác giả</h2>
						<a class="tg-btn" href="javascript:void(0);">Xem tất cả</a>
					</div>
				</div>
				<div id="tg-pickedbyauthorslider" class="tg-pickedbyauthor tg-pickedbyauthorslider owl-carousel">
					<div class="item">
						<div class="tg-postbook">
							<figure class="tg-featureimg">
								<div class="tg-bookimg">
									<div class="tg-frontcover"><img src="{{asset('frontend/images/books/img-10.jpg')}}" alt="image description"></div>
								</div>
								<div class="tg-hovercontent">
									<div class="tg-description">
										<p>Consectetur adipisicing elit sed do eiusmod tempor incididunt labore toloregna aliqua enim adia minim veniam, quis nostrud.</p>
									</div>
									<strong class="tg-bookpage">Book Pages: 206</strong>
									<strong class="tg-bookcategory">Category: Adventure, Fun</strong>
									<strong class="tg-bookprice">Price: $23.18</strong>
									<div class="tg-ratingbox"><span class="tg-stars"><span></span></span></div>
								</div>
							</figure>
							<div class="tg-postbookcontent">
								<div class="tg-booktitle">
									<h3><a href="javascript:void(0);">Seven Minutes In Heaven</a></h3>
								</div>
								<span class="tg-bookwriter">Tác giả: <a href="javascript:void(0);">Sunshine Orlando</a></span>
								<a class="tg-btn tg-btnstyletwo" href="javascript:void(0);">
									<i class="fa fa-shopping-basket"></i>
									<em>Thêm vào giỏ hàng</em>
								</a>
							</div>
						</div>
					</div>
					<div class="item">
						<div class="tg-postbook">
							<figure class="tg-featureimg">
								<div class="tg-bookimg">
									<div class="tg-frontcover"><img src="{{asset('frontend/images/books/img-11.jpg')}}" alt="image description"></div>
								</div>
								<div class="tg-hovercontent">
									<div class="tg-description">
										<p>Consectetur adipisicing elit sed do eiusmod tempor incididunt labore toloregna aliqua enim adia minim veniam, quis nostrud.</p>
									</div>
									<strong class="tg-bookpage">Book Pages: 206</strong>
									<strong class="tg-bookcategory">Category: Adventure, Fun</strong>
									<strong class="tg-bookprice">Price: $23.18</strong>
									<div class="tg-ratingbox"><span class="tg-stars"><span></span></span></div>
								</div>
							</figure>
							<div class="tg-postbookcontent">
								<div class="tg-booktitle">
									<h3><a href="javascript:void(0);">Slow And Steady Wins The Race</a></h3>
								</div>
								<span class="tg-bookwriter">Tác giả: <a href="javascript:void(0);">Drusilla Glandon</a></span>
								<a class="tg-btn tg-btnstyletwo" href="javascript:void(0);">
									<i class="fa fa-shopping-basket"></i>
									<em>Thêm vào giỏ hàng</em>
								</a>
							</div>
						</div>
					</div>
					<div class="item">
						<div class="tg-postbook">
							<figure class="tg-featureimg">
								<div class="tg-bookimg">
									<div class="tg-frontcover"><img src="{{asset('frontend/images/books/img-12.jpg')}}" alt="image description"></div>
								</div>
								<div class="tg-hovercontent">
									<div class="tg-description">
										<p>Consectetur adipisicing elit sed do eiusmod tempor incididunt labore toloregna aliqua enim adia minim veniam, quis nostrud.</p>
									</div>
									<strong class="tg-bookpage">Book Pages: 206</strong>
									<strong class="tg-bookcategory">Category: Adventure, Fun</strong>
									<strong class="tg-bookprice">Price: $23.18</strong>
									<div class="tg-ratingbox"><span class="tg-stars"><span></span></span></div>
								</div>
							</figure>
							<div class="tg-postbookcontent">
								<div class="tg-booktitle">
									<h3><a href="javascript:void(0);">There’s No Time Like The Present</a></h3>
								</div>
								<span class="tg-bookwriter">Tác giả: <a href="javascript:void(0);">Patrick Seller</a></span>
								<a class="tg-btn tg-btnstyletwo" href="javascript:void(0);">
									<i class="fa fa-shopping-basket"></i>
									<em>Thêm vào giỏ hàng</em>
								</a>
							</div>
						</div>
					</div>
					<div class="item">
						<div class="tg-postbook">
							<figure class="tg-featureimg">
								<div class="tg-bookimg">
									<div class="tg-frontcover"><img src="{{asset('frontend/images/books/img-10.jpg')}}" alt="image description"></div>
								</div>
								<div class="tg-hovercontent">
									<div class="tg-description">
										<p>Consectetur adipisicing elit sed do eiusmod tempor incididunt labore toloregna aliqua enim adia minim veniam, quis nostrud.</p>
									</div>
									<strong class="tg-bookpage">Book Pages: 206</strong>
									<strong class="tg-bookcategory">Category: Adventure, Fun</strong>
									<strong class="tg-bookprice">Price: $23.18</strong>
									<div class="tg-ratingbox"><span class="tg-stars"><span></span></span></div>
								</div>
							</figure>
							<div class="tg-postbookcontent">
								<div class="tg-booktitle">
									<h3><a href="javascript:void(0);">Seven Minutes In Heaven</a></h3>
								</div>
								<span class="tg-bookwriter">Tác giả: <a href="javascript:void(0);">Sunshine Orlando</a></span>
								<a class="tg-btn tg-btnstyletwo" href="javascript:void(0);">
									<i class="fa fa-shopping-basket"></i>
									<em>Thêm vào giỏ hàng</em>
								</a>
							</div>
						</div>
					</div>
					<div class="item">
						<div class="tg-postbook">
							<figure class="tg-featureimg">
								<div class="tg-bookimg">
									<div class="tg-frontcover"><img src="{{asset('frontend/images/books/img-11.jpg')}}" alt="image description"></div>
								</div>
								<div class="tg-hovercontent">
									<div class="tg-description">
										<p>Consectetur adipisicing elit sed do eiusmod tempor incididunt labore toloregna aliqua enim adia minim veniam, quis nostrud.</p>
									</div>
									<strong class="tg-bookpage">Book Pages: 206</strong>
									<strong class="tg-bookcategory">Category: Adventure, Fun</strong>
									<strong class="tg-bookprice">Price: $23.18</strong>
									<div class="tg-ratingbox"><span class="tg-stars"><span></span></span></div>
								</div>
							</figure>
							<div class="tg-postbookcontent">
								<div class="tg-booktitle">
									<h3><a href="javascript:void(0);">Slow And Steady Wins The Race</a></h3>
								</div>
								<span class="tg-bookwriter">Tác giả: <a href="javascript:void(0);">Drusilla Glandon</a></span>
								<a class="tg-btn tg-btnstyletwo" href="javascript:void(0);">
									<i class="fa fa-shopping-basket"></i>
									<em>Thêm vào giỏ hàng</em>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--************************************
			Picked By Author End
	*************************************-->
	<!--************************************
			Testimonials Start
	*************************************-->
	<section class="tg-parallax tg-bgtestimonials tg-haslayout" data-z-index="-100" data-appear-top-offset="600" data-parallax="scroll" data-image-src="{{asset('frontend/images/parallax/bgparallax-05.jpg')}}">
		<div class="tg-sectionspace tg-haslayout">
			<div class="container">
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-8 col-lg-push-2">
						<div id="tg-testimonialsslider" class="tg-testimonialsslider tg-testimonials owl-carousel">
							<div class="item tg-testimonial">
								<figure><img src="{{asset('frontend/images/author/imag-02.jpg')}}" alt="image description"></figure>
								<blockquote><q>
Có thể tăng cân, nhưng nó sẽ xảy ra vào thời điểm mà tôi sẽ giảm cân với rất nhiều nỗ lực, và không ai tham gia bất kỳ khóa đào tạo nào của chúng tôi trừ khi đó là vì lợi ích nào đó.</q></blockquote>
								<div class="tg-testimonialauthor">
									<h3>Holli Nhà sản xuất cửa sổ Holli</h3>
									<span>Quản lý @ CIFP</span>
								</div>
							</div>
							<div class="item tg-testimonial">
								<figure><img src="{{asset('frontend/images/author/imag-02.jpg')}}" alt="image description"></figure>
								<blockquote><q>
Có thể tăng cân, nhưng nó sẽ xảy ra vào thời điểm mà tôi sẽ giảm cân với rất nhiều nỗ lực, và không ai tham gia bất kỳ khóa đào tạo nào của chúng tôi trừ khi đó là vì lợi ích nào đó.</q></blockquote>
								<div class="tg-testimonialauthor">
									<h3>Holli Nhà sản xuất cửa sổ Holli</h3>
									<span>Quản lý @ CIFP</span>
								</div>
							</div>
							<div class="item tg-testimonial">
								<figure><img src="{{asset('frontend/images/author/imag-02.jpg')}}" alt="image description"></figure>
								<blockquote><q>
Có thể tăng cân, nhưng nó sẽ xảy ra vào thời điểm mà tôi sẽ giảm cân với rất nhiều nỗ lực, và không ai tham gia bất kỳ khóa đào tạo nào của chúng tôi trừ khi đó là vì lợi ích nào đó.</q></blockquote>
								<div class="tg-testimonialauthor">
									<h3>Holli Nhà sản xuất cửa sổ Holli</h3>
									<span>Quản lý @ CIFP</span>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
		<!--************************************
				Testimonials End
		*************************************-->
	
	<!--************************************
			Call to Action Start
	*************************************-->
	<section class="tg-parallax tg-bgcalltoaction tg-haslayout" data-z-index="-100" data-appear-top-offset="600" data-parallax="scroll" data-image-src="{{asset('frontend/images/parallax/bgparallax-06.jpg')}}">
		<div class="tg-sectionspace tg-haslayout">
			<div class="container">
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<div class="tg-calltoaction">
							<h2>Giảm giá mở cho tất cả</h2>
						
							<a class="tg-btn tg-active d-xl-none" href="javascript:void(0);">Read More</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--************************************
			Call to Action End
	*************************************-->
	<!--************************************
			Latest News Start
	*************************************-->
	<section class="tg-sectionspace tg-haslayout">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<div class="tg-sectionhead">
						<h2><span>Tin tức &amp; Bài báo mới nhất</span>tin tức hot nhất </h2>
						<a class="tg-btn" href="javascript:void(0);">Xem tất cả</a>
					</div>
				</div>
				<div id="tg-postslider" class="tg-postslider tg-blogpost owl-carousel">
					<article class="item tg-post">
						<figure><a href="javascript:void(0);"><img src="{{asset('frontend/images/blog/img-01.jpg')}}" alt="image description"></a></figure>
						<div class="tg-postcontent">
							<ul class="tg-bookscategories">
								<li><a href="javascript:void(0);">Adventure</a></li>
								<li><a href="javascript:void(0);">Fun</a></li>
							</ul>
							<div class="tg-themetagbox"><span class="tg-themetag">featured</span></div>
							<div class="tg-posttitle">
								<h3><a href="javascript:void(0);">Where The Wild Things Are</a></h3>
							</div>
							<span class="tg-bookwriter">By: <a href="javascript:void(0);">Kathrine Culbertson</a></span>
							<ul class="tg-postmetadata">
								<li><a href="javascript:void(0);"><i class="fa fa-comment-o"></i><i>21,415 Comments</i></a></li>
								<li><a href="javascript:void(0);"><i class="fa fa-eye"></i><i>24,565 Views</i></a></li>
							</ul>
						</div>
					</article>
					<article class="item tg-post">
						<figure><a href="javascript:void(0);"><img src="{{asset('frontend/images/blog/img-02.jpg')}}" alt="image description"></a></figure>
						<div class="tg-postcontent">
							<ul class="tg-bookscategories">
								<li><a href="javascript:void(0);">Adventure</a></li>
								<li><a href="javascript:void(0);">Fun</a></li>
							</ul>
							<div class="tg-themetagbox"><span class="tg-themetag">featured</span></div>
							<div class="tg-posttitle">
								<h3><a href="javascript:void(0);">All She Wants To Do Is Dance</a></h3>
							</div>
							<span class="tg-bookwriter">By: <a href="javascript:void(0);">Kathrine Culbertson</a></span>
							<ul class="tg-postmetadata">
								<li><a href="javascript:void(0);"><i class="fa fa-comment-o"></i><i>21,415 Comments</i></a></li>
								<li><a href="javascript:void(0);"><i class="fa fa-eye"></i><i>24,565 Views</i></a></li>
							</ul>
						</div>
					</article>
					<article class="item tg-post">
						<figure><a href="javascript:void(0);"><img src="{{asset('frontend/images/blog/img-03.jpg')}}" alt="image description"></a></figure>
						<div class="tg-postcontent">
							<ul class="tg-bookscategories">
								<li><a href="javascript:void(0);">Adventure</a></li>
								<li><a href="javascript:void(0);">Fun</a></li>
							</ul>
							<div class="tg-themetagbox"><span class="tg-themetag">featured</span></div>
							<div class="tg-posttitle">
								<h3><a href="javascript:void(0);">Why Walk When You Can Climb?</a></h3>
							</div>
							<span class="tg-bookwriter">By: <a href="javascript:void(0);">Kathrine Culbertson</a></span>
							<ul class="tg-postmetadata">
								<li><a href="javascript:void(0);"><i class="fa fa-comment-o"></i><i>21,415 Comments</i></a></li>
								<li><a href="javascript:void(0);"><i class="fa fa-eye"></i><i>24,565 Views</i></a></li>
							</ul>
						</div>
					</article>
					<article class="item tg-post">
						<figure><a href="javascript:void(0);"><img src="{{asset('frontend/images/blog/img-04.jpg')}}" alt="image description"></a></figure>
						<div class="tg-postcontent">
							<ul class="tg-bookscategories">
								<li><a href="javascript:void(0);">Adventure</a></li>
								<li><a href="javascript:void(0);">Fun</a></li>
							</ul>
							<div class="tg-themetagbox"><span class="tg-themetag">featured</span></div>
							<div class="tg-posttitle">
								<h3><a href="javascript:void(0);">Dance Like Nobody’s Watching</a></h3>
							</div>
							<span class="tg-bookwriter">By: <a href="javascript:void(0);">Kathrine Culbertson</a></span>
							<ul class="tg-postmetadata">
								<li><a href="javascript:void(0);"><i class="fa fa-comment-o"></i><i>21,415 Comments</i></a></li>
								<li><a href="javascript:void(0);"><i class="fa fa-eye"></i><i>24,565 Views</i></a></li>
							</ul>
						</div>
					</article>
					<article class="item tg-post">
						<figure><a href="javascript:void(0);"><img src="{{asset('frontend/images/blog/img-02.jpg')}}" alt="image description"></a></figure>
						<div class="tg-postcontent">
							<ul class="tg-bookscategories">
								<li><a href="javascript:void(0);">Adventure</a></li>
								<li><a href="javascript:void(0);">Fun</a></li>
							</ul>
							<div class="tg-themetagbox"><span class="tg-themetag">featured</span></div>
							<div class="tg-posttitle">
								<h3><a href="javascript:void(0);">All She Wants To Do Is Dance</a></h3>
							</div>
							<span class="tg-bookwriter">By: <a href="javascript:void(0);">Kathrine Culbertson</a></span>
							<ul class="tg-postmetadata">
								<li><a href="javascript:void(0);"><i class="fa fa-comment-o"></i><i>21,415 Comments</i></a></li>
								<li><a href="javascript:void(0);"><i class="fa fa-eye"></i><i>24,565 Views</i></a></li>
							</ul>
						</div>
					</article>
					<article class="item tg-post">
						<figure><a href="javascript:void(0);"><img src="{{asset('frontend/images/blog/img-03.jpg')}}" alt="image description"></a></figure>
						<div class="tg-postcontent">
							<ul class="tg-bookscategories">
								<li><a href="javascript:void(0);">Adventure</a></li>
								<li><a href="javascript:void(0);">Fun</a></li>
							</ul>
							<div class="tg-themetagbox"><span class="tg-themetag">featured</span></div>
							<div class="tg-posttitle">
								<h3><a href="javascript:void(0);">Why Walk When You Can Climb?</a></h3>
							</div>
							<span class="tg-bookwriter">By: <a href="javascript:void(0);">Kathrine Culbertson</a></span>
							<ul class="tg-postmetadata">
								<li><a href="javascript:void(0);"><i class="fa fa-comment-o"></i><i>21,415 Comments</i></a></li>
								<li><a href="javascript:void(0);"><i class="fa fa-eye"></i><i>24,565 Views</i></a></li>
							</ul>
						</div>
					</article>
				</div>
			</div>
		</div>
	</section>
	<!--************************************
			Latest News End
	*************************************-->
@endsection

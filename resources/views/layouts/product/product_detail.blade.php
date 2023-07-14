@extends('layouts.app')

@section('content')
<div class=" tg-haslayout">
	<div class="container">
		<div class="row">
			<div id="tg-twocolumns" class="tg-twocolumns">
				<div class="col-xs-12 col-sm-8 col-md-8 col-lg-9 pull-right">
					<div id="tg-content" class="tg-content">
						<div class="tg-featurebook alert d-xl-none" role="alert">
								<button type="button" class="close d" data-dismiss="alert" aria-label="Close">
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
						<div class="tg-productdetail">
							<div class="row">
								<div class="col-7"> 
									<div class="product-top">
										<div class="fotorama"   
										data-width="600"
										data-ratio="16/9"
										data-autoplay="true"
										data-maxwidth="100%" 	
										data-allowfullscreen="true"
										data-nav="thumbs">
											@foreach($contact as $key => $item)
												<img src="{{ asset('assets/images/upload/product/'.$item->photo) }}" alt="image description">
													<?php /*if($item->stock == 0){?>
														<span class="hethang"><img src="{{asset('frontend/images/hethang.png')}}" alt=""></span>
													<?php }*/?> 
											
											@endforeach
											@foreach($gallery as $k => $v)
										
												<img src="{{ asset('assets/images/upload/product/'.$v->thumbnail) }}" alt="image description">
											
											@endforeach
										</div>
									</div>
								</div>
								<div class="col-5">
									@foreach($contact as $key => $item)
										
										<div class="tg-postbook">
											<div class="tg-postbookcontent">
												<div class="tg-booktitle">
													<h2>{{$item->name}}</h2>
												</div>
												<span class="tg-bookprice">
													<span>Giá: </span>
													<ins>{{ number_format($item->regular_price,0,",",",") }} VNĐ</ins>
													<del class="d-xl-none">$27.20</del>
												</span>
												<span class="tg-bookwriter d-xl-none">You save $4.02</span>
												<span class="tg-bookwriter">Tác giả: <a class="text-decoration-none" href="{{route('product.showauthor',$author->id)}}">{{ $author->name }}</a></span>
												<ul class="tg-delevrystock">
													<li><a class="text-decoration-none" href="{{route('product.showauthor',$category->id)}}">
														<span>Thể Loại:{{ $category->name }}</a> </span></li>
													{{-- <li><i class="icon-rocket"></i><span>Giao hàng miễn phí trên toàn quốc </span></li> --}}
													<li><i class="icon-store"></i>
													<span>Trạng thái: <em>{{ $item->stock>0?'Còn hàng':'Hết hàng'; }}</em></span></li>
												</ul>
												<div class="tg-quantityholder">
													<span>Số lượng: </span>
													<!-- <em class="minus">-</em> -->
													<input type="number" class="result" data-sl="{{ $item->stock }}" min="1" value="1" id="quantity1" data-id="{{ $item->id}}" name="quantity" max="{{ $item->stock }}">
													<!-- <em class="plus">+</em> -->
												</div>
												<?php if($item->stock == 0 || ktraSLT($item->stock,$item->id) == $item->stock){?>
													<a class="tg-btn tg-active tg-btn-lg" style="opacity: .5;">
														Thêm vào giỏ hàng
													</a>
												<?php }else{?>
													<a class="tg-btn btn-addcart tg-active tg-btn-lg" href="{{ route('order.addtocart', $item->id) }}">
														Thêm vào giỏ hàng
													</a>
												<?php }?>
												
												
												<a class="tg-btnaddtowishlist d-xl-none" href="javascript:void(0);">
													<span>Mua ngay</span>
												</a>
											</div>
										</div>
									@endforeach
								</div>
							</div>	
							<div class="row">
								@csrf
									
									<div class="col-xs-12 col-sm-12 mt-3">
									@foreach ($contact as $item )
										<div class="tg-productcontent">
											
											<div class="tg-share d-none">
												<span>Share:</span>
												<ul class="tg-socialicons">
													<li class="tg-facebook"><a href="javascript:void(0);"><i class="fa fa-facebook"></i></a></li>
													<li class="tg-twitter"><a href="javascript:void(0);"><i class="fa fa-twitter"></i></a></li>
													<li class="tg-linkedin"><a href="javascript:void(0);"><i class="fa fa-linkedin"></i></a></li>
													<li class="tg-googleplus"><a href="javascript:void(0);"><i class="fa fa-google-plus"></i></a></li>
													<li class="tg-rss"><a href="javascript:void(0);"><i class="fa fa-rss"></i></a></li>
												</ul>
											</div>
											<div class="tg-sectionhead">
												<h2>Mô tả:</h2>
											</div>
											<div class="tg-description">
											{{ $item->desc }}
											</div>
											<div class="tg-sectionhead">
												<h2>Nội dung</h2>
											</div>
											<div class="tg-productinfo">
											{{ $item->content }}
											</div>
											
										</div>
									@endforeach

									
									</div>
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
									@foreach($categorydetail as $k => $v)
									<li><a href="{{route('product.showcategory',$v->id)}}"><span>{{$v->name}}</span><em>
										
									{{(!empty($v->count)) ? "$v->count":"0"}}</em></a></li>	
									@endforeach
								</ul>
							</div>
						</div>
						<div class="tg-widget tg-catagories">
							<div class="tg-widgettitle">
								<h3>Tác giả</h3>
							</div>
							<div class="tg-widgetcontent">
								<ul>
									@foreach($authordetail as $k => $v)
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
{{-- <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script> --}}
<script
  src="https://code.jquery.com/jquery-3.7.0.js"
  integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM="
  crossorigin="anonymous"></script>
<script>
	$(document).ready(function(){
		$('.btn-addcart').click(function (e) { 
			e.preventDefault();
			let sltk = $('#quantity1').data('sl');
			let qty = $('#quantity1').val();
			let id = $('#quantity1').data('id');
			let _token = $("input[name='_token']").val();
			// alert(qty);
			if(qty > sltk){
				alert("Số lượng mua quá lớn so với tồn kho của sản phẩm!!!!");
				return false;
			}
			$.ajax({
				url:"/cart/add",
				method:"POST",
				data:{id:id,qty:qty,_token:_token},
				success: function(data){
					window.location.href = '/cart';
				},
				error: function(xhr, ajaxOptions, thrownError) {
					alert(xhr.status);
					alert(thrownError);
				}
				});
		});

	});
			</script>
@endsection

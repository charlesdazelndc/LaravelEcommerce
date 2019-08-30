@extends('frontend.master')



@section('tittle')

Home
@endsection









@section('body')
	<!--banner-->
		<div class="banner-w3">
			<div class="demo-1">            
				<div id="example1" class="core-slider core-slider__carousel example_1">
					<div class="core-slider_viewport">
						<div class="core-slider_list">
							<div class="core-slider_item">
								<img src="{{ asset('/') }}/images/frontend_img/b1.jpg" class="img-responsive" alt="">
							</div>
							 <div class="core-slider_item">
								 <img src="{{ asset('/') }}/images/frontend_img/b2.jpg" class="img-responsive" alt="">
							 </div>
							<div class="core-slider_item">
								  <img src="{{ asset('/') }}/images/frontend_img/b3.jpg" class="img-responsive" alt="">
							</div>
							<div class="core-slider_item">
								  <img src="{{ asset('/') }}/images/frontend_img/b4.jpg" class="img-responsive" alt="">
							</div>
						 </div>
					</div>
					<div class="core-slider_nav">
						<div class="core-slider_arrow core-slider_arrow__right" style="background-image:url({{ asset('images/frontend_img/arrow_right.png') }})"></div>
						<div class="core-slider_arrow core-slider_arrow__left" style="background-image:url({{ asset('images/frontend_img/arrow_left.png') }})"></div>
					</div>
					<div class="core-slider_control-nav"></div>
				</div>
			</div>
			<link href="{{asset('css/frontend_css/coreSlider.css')}}" rel="stylesheet" type="text/css">
			<script src="{{asset('js/frontend_js/coreSlider.js')}}"></script>
			<script>
			$('#example1').coreSlider({
			  pauseOnHover: false,
			  interval: 3000,
			  controlNavEnabled: true
			});

			</script>

		</div>	
		<!--banner-->
			<!--content-->
		<div class="content">
			<!--banner-bottom-->
				<div class="ban-bottom-w3l">
					<div class="container">
						<div class="col-md-6 ban-bottom">
							<div class="ban-top">
								<img src="{{ asset('/') }}/images/frontend_img/p1.jpg" class="img-responsive" alt=""/>
								<div class="ban-text">
									<h4>Men’s Clothing</h4>
								</div>
								<div class="ban-text2 hvr-sweep-to-top">
									<h4>50% <span>Off/-</span></h4>
								</div>
							</div>
						</div>
						<div class="col-md-6 ban-bottom3">
							<div class="ban-top">
								<img src="{{ asset('/') }}/images/frontend_img/p2.jpg" class="img-responsive" alt=""/>
								<div class="ban-text1">
									<h4>Women's Clothing</h4>
								</div>
							</div>
							<div class="ban-img">
								<div class=" ban-bottom1">
									<div class="ban-top">
										<img src="{{ asset('/') }}/images/frontend_img/p3.jpg" class="img-responsive" alt=""/>
										<div class="ban-text1">
											<h4>T - Shirt</h4>
										</div>
									</div>
								</div>
								<div class="ban-bottom2">
									<div class="ban-top">
										<img src="{{ asset('/') }}/images/frontend_img/p4.jpg" class="img-responsive" alt=""/>
										<div class="ban-text1">
											<h4>Hand Bag</h4>
										</div>
									</div>
								</div>
								<div class="clearfix"></div>
							</div>
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
			<!--banner-bottom-->
			<!--new-arrivals-->
				<div class="new-arrivals-w3agile">
					<div class="container">
						<h2 class="tittle">New Arrivals</h2>
						<div class="arrivals-grids">
							@foreach($newproducts as $newproduct)
							<div class="col-md-3 arrival-grid simpleCart_shelfItem">
								<div class="grid-arr">
									<div  class="grid-arrival">
										<figure>		
											<a href="{{ route('product-details',['id'=>$newproduct->id,'name'=>$newproduct->product_name]) }}" class="new-gri" >
												<div class="grid-img">
													<img  src="{{ asset($newproduct->product_image) }}""{{ asset($newproduct->product_image) }}" class="img-responsive" alt="">
												</div>
												<div class="grid-img">
													<img  src="{{ asset($newproduct->product_image) }}" class="img-responsive"  alt="">
												</div>			
											</a>		
										</figure>	
									</div>
									<div class="ribben">
										<p>NEW</p>
									</div>
									<div class="ribben1">
										<p>SALE</p>
									</div>
									<div class="block">
										<div class="starbox small ghosting"> </div>
									</div>
									<div class="women">
										<h6><a href="single.html">{{ $newproduct->product_name }}</a></h6>
										<span class="size">XL / XXL / S </span>
										<p ><em class="item_price">{{ $newproduct->product_price }}</em></p>
										<a href="#" data-text="Add To Cart" class="my-cart-b item_add">Add To Cart</a>
									</div>
								</div>
							</div>
						@endforeach
							<div class="clearfix"></div>
						</div>
					</div>
				</div>
			<!--new-arrivals-->
				<!--accessories-->
			<div class="accessories-w3l" style="background-image:url({{ asset('images/frontend_img/ban1.jpg') }})">
				<div class="container">
					<h3 class="tittle">20% Discount on</h3>
					<span>TRENDING DESIGNS</span>
					<div class="button">
						<a href="#" class="button1"> Shop Now</a>
						<a href="#" class="button1"> Quick View</a>
					</div>
				</div>
			</div>
			<!--accessories-->
			<!--Products-->
			
			<!--Products-->
		
				<div class="new-arrivals-w3agile">
					<div class="container">
						<h3 class="tittle1">Best Sellers</h3>
						<div class="arrivals-grids">
							@foreach($newproducts as $newproduct)
							<div class="col-md-3 arrival-grid simpleCart_shelfItem">
								<div class="grid-arr">
									<div  class="grid-arrival">
										<figure>		
											<a href="{{ route('product-details',['id'=>$newproduct->id,'name'=>$newproduct->product_name]) }}" >
												<div class="grid-img">
													<img  src="{{ asset($newproduct->product_image) }}" class="img-responsive" alt="">
												</div>
												<div class="grid-img">
													<img  src="{{ asset($newproduct->product_image) }}" class="img-responsive"  alt="">
												</div>			
											</a>		
										</figure>	
									</div>
									<div class="ribben">
										<p>NEW</p>
									</div>
									<div class="ribben1">
										<p>SALE</p>
									</div>
									<div class="block">
										<div class="starbox small ghosting"> </div>
									</div>
									<div class="women">
										<h6><a href="single.html">{{ $newproduct->product_name }}</a></h6>
										<span class="size">XL / XXL / S </span>
										<p ><del>$100.00</del><em class="item_price">{{ $newproduct->product_price }}</em></p>
										<a href="#" data-text="Add To Cart" class="my-cart-b item_add">Add To Cart</a>
									</div>
								</div>
							</div>
							@endforeach
							<div class="clearfix"></div>
						</div>
					</div>
				</div>
			<!--new-arrivals-->
		</div>

@endsection
@include('layout.header', ['PageDescription' => 'شركة Arte Kids لملابس الأطفال من عمر 6 أشهر و حتى عمر 16 سنة, نخفيضات و عروض يومية و موديلات متجددة و مميزة'])
<body>
	@include('layout.navbar')
	@include('layout.errors')
	<h1 class="d-none">موقع ارتي لملابس الأطفال</h1>
	<!-- Hero section -->
	<section class="hero-section">
		<div class="hero-slider owl-carousel">
			<div class="hs-item set-bg" data-setbg="{{url('public/img')}}/bg.jpg">
				<div class="container">
					<div class="row">
						<div class="col-xl-6 col-lg-7 text-white text-right">
							<span>وصل حديثاً</span>
							<h2>تشكيلة الصيف الجديدة 2021</h2>
							<p>تشكيلة متنوعة من موديلات صيف 2021! أكثر من 100 منتج جديد لطفلك</p>
							<a href="{{route('shop')}}" class="site-btn sb-white">استعراض المنتجات</a>
						</div>
					</div>
					<div class="offer-card text-white">
						<span>من</span>
						<h2>150</h2>
						<p>جنيه</p>
					</div>
				</div>
			</div>
			<div class="hs-item set-bg" data-setbg="{{url('public/img')}}/bg-2.jpg">
				<div class="container">
					<div class="row">
						<div class="col-xl-6 col-lg-7 text-white text-right">
							<span>جديد</span>
							<h2>تشكيلة الصيف</h2>
							<p>أفضل العروض على تشكيلة الصيف الجديدة 2021 - 2022</p>
							<a href="#" class="site-btn sb-line">عرض</a>
							<a href="#" class="site-btn sb-white">اضف الى السلة</a>
						</div>
					</div>
					<div class="offer-card text-white">
						<span>من</span>
						<h2>200</h2>
						<p>جنيه</p>
					</div>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="slide-num-holder" id="snh-1"></div>
		</div>
	</section>
	<!-- Hero section end -->
	<!-- Features section -->
	<section class="features-section">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-4 p-0 feature">
					<div class="feature-inner">
						<div class="feature-icon">
							<img src="{{url('public/img')}}/icons/1.png" alt="#">
						</div>
						<h2>طرق دفع بسيطة</h2>
					</div>
				</div>
				<div class="col-md-4 p-0 feature">
					<div class="feature-inner">
						<div class="feature-icon">
							<img src="{{url('public/img')}}/icons/2.png" alt="#">
						</div>
						<h2>منتجات مميزة</h2>
					</div>
				</div>
				<div class="col-md-4 p-0 feature">
					<div class="feature-inner">
						<div class="feature-icon">
							<img src="{{url('public/img')}}/icons/3.png" alt="#">
						</div>
						<h2>توصيل سريع و موثوق</h2>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Features section end -->


	<!-- letest product section -->
	<section class="top-letest-product-section">
		<div class="container">
			<div class="section-title">
				<h2>منتجات جديدة</h2>
			</div>
			<div class="row">
				@forelse($NewProducts as $NewProduct)
					<div class="col-lg-3">
							<a href="{{route('product' , [$NewProduct->slug , $NewProduct->id])}}">
								<div class="product-item">
									<div class="pi-pic">
										@if($NewProduct->AvailableVariations()['inventory'] == 0)
											<div class="tag-sold mr-5">تم البيع بالكامل</div>
										@endif
										@if($NewProduct->hasDiscount())
											<div class="tag-sale mr-5">فترة محدودة</div>
										@endif
										<div class="tag-new">جديد</div>
										<img src="{{$NewProduct->MainImage}}" alt="{{$NewProduct->title}}">
										<div class="pi-links">
											{{-- <a href="{{route('cart.add')}}" data-id="{{$NewProduct->id}}" class="add-card"><i class="flaticon-bag"></i><span>اضافة الى السلة</span></a> --}}
											@auth
												<a href="javascript:;" class="wishlist-btn @if($NewProduct->LikedByUser()) liked @endif global-add-to-wishlist" data-action="{{route('favourite.toggle')}}" data-id="{{$NewProduct->id}}" data-user="{{auth()->user()->id}}"><i class="flaticon-heart"></i></a>
											@endauth
										</div>
									</div>
									<a href="{{route('product' , [$NewProduct->slug , $NewProduct->id])}}">
										<div class="pi-text">
											<h6>{{$NewProduct->FinalPrice()}} L.E</h6>
											<p>{{$NewProduct->title}}</p>
										</div>
									</a>
								</div>
							</a>
				</div>
				@empty
				<p class="text-center">لا يوجد منتجات جديدة حالياً</p>
				@endforelse
			</div>
		</div>
	</section>
	<!-- letest product section end -->
	<!-- Product filter section -->
	<section class="product-filter-section">
		<div class="container">
			<div class="section-title">
				<h2>الأكثر مبيعاً</h2>
			</div>
			{{-- <ul class="product-filter-menu">
				<li><a href="#">TOPS</a></li>
				<li><a href="#">JUMPSUITS</a></li>
				<li><a href="#">LINGERIE</a></li>
				<li><a href="#">JEANS</a></li>
				<li><a href="#">DRESSES</a></li>
				<li><a href="#">COATS</a></li>
				<li><a href="#">JUMPERS</a></li>
				<li><a href="#">LEGGINGS</a></li>
			</ul> --}}
			<div class="row">
				@forelse($PromotedProducts as $PromotedProduct)
				<div class="col-lg-3 col-sm-6">
					<a href="{{route('product' , [$PromotedProduct->slug , $PromotedProduct->id])}}">
						<div class="product-item">
							<div class="pi-pic">
								@if($PromotedProduct->AvailableVariations()['inventory'] == 0)
									<div class="tag-sold mr-5">تم البيع بالكامل</div>
								@endif
								@if($PromotedProduct->hasDiscount())
									<div class="tag-sale">فترة محدودة</div>
								@endif
								<img src="{{$PromotedProduct->MainImage}}" alt="{{$PromotedProduct->title}}">
								<div class="pi-links">
									<a href="#" class="add-card"><i class="flaticon-bag"></i><span>اضافة الى السلة</span></a>
									@auth
										<a href="javascript:;" class="wishlist-btn @if($PromotedProduct->LikedByUser()) liked @endif global-add-to-wishlist" data-action="{{route('favourite.toggle')}}" data-id="{{$PromotedProduct->id}}" data-user="{{auth()->user()->id}}"><i class="flaticon-heart"></i></a>
									@endauth
								</div>
							</div>
							<a href="{{route('product' , [$PromotedProduct->slug , $PromotedProduct->id])}}">
								<div class="pi-text">
									<h6>{{$PromotedProduct->FinalPrice()}} L.E</h6>
									<p>{{$PromotedProduct->title}}</p>
								</div>
							</a>
						</div>
					</a>
				</div>
				@empty
				<p class="text-center">لا يوجد منتجات مميزة حالياً</p>
				@endforelse
			</div>
			<div class="text-center pt-5">
				<a href="{{route('shop')}}" class="site-btn sb-line sb-dark">عرض المزيد</a>
			</div>
		</div>
	</section>
	<!-- Product filter section end -->
	<!-- Our Brands Start -->
	<section class="our-brands-section text-right">
		<div class="container">
			<div class="section-title">
				<h2>علاماتنا التجارية</h2>
			</div>
			<div class="row">
				<div class="col-lg-4">
                    <img src="{{url('public')}}/img/arte-logo.png" class="w-auto" alt="Arte Logo">
                </div>
                <div class="col-lg-4">
                    <img src="{{url('public')}}/img/white-card-logo.png" class="w-auto" alt="White Card Logo">
                </div>
                <div class="col-lg-4">
                    <img src="{{url('public')}}/img/enigma-logo.png" class="w-auto" alt="Enigma Logo">
                </div>
			</div>
		</div>
	</section>
	<!-- Our Brands End -->

	<!-- Banner section -->
	<section class="banner-section">
		<div class="container">
			<div class="banner set-bg text-right" data-setbg="{{url('public/img')}}/banner-bg.jpg">
				<div class="tag-new">جديد</div>
				<div class="row">
					<div class="col-6"></div>
					<div class="col-6">
						<span>وصل حديثاً</span>
						<h2>تشكيلة صيف 2021</h2>
						<a href="#" class="site-btn">تسوق الآن</a>
					</div>
				</div>

			</div>
		</div>
	</section>
	<!-- Banner section end  -->
	@include('layout.footer')
	@include('layout.scripts')
</body>

</html>

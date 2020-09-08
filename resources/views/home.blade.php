@include('layout.header')
<body>
@include('layout.navbar')
	<!-- Hero section -->
	<section class="hero-section">
		<div class="hero-slider owl-carousel">
			<div class="hs-item set-bg" data-setbg="{{url('public/img')}}/bg.jpg">
				<div class="container">
					<div class="row">
						<div class="col-xl-6 col-lg-7 text-white text-right">
							<span>تشكيلة جديدة</span>
							<h2>اسم تسويقي لمنتج</h2>
							<p>شرح عن هذا المنتج</p>
							<a href="#" class="site-btn sb-line">المزيد</a>
							<a href="#" class="site-btn sb-white">أضف الى السلة</a>
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
			<div class="product-slider owl-carousel">
				<div class="product-item">
					<div class="pi-pic">
						<img src="{{url('public/img')}}/product/1.jpg" alt="">
						<div class="pi-links">
							<a href="#" class="add-card"><i class="flaticon-bag"></i><span>اضافة الى السلة</span></a>
							<a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
						</div>
					</div>
					<div class="pi-text">
						<h6>150 L.E</h6>
						<p>ترينج شتوي موديل أسد</p>
					</div>
				</div>
				<div class="product-item">
					<div class="pi-pic">
						<div class="tag-new">جديد</div>
						<img src="{{url('public/img')}}/product/2.jpg" alt="">
						<div class="pi-links">
							<a href="#" class="add-card"><i class="flaticon-bag"></i><span>اضافة الى السلة</span></a>
							<a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
						</div>
					</div>
					<div class="pi-text">
						<h6>150 L.E</h6>
						<p>موديل صيفي موديل قطة</p>
					</div>
				</div>
				<div class="product-item">
					<div class="pi-pic">
						<img src="{{url('public/img')}}/product/3.jpg" alt="">
						<div class="pi-links">
							<a href="#" class="add-card"><i class="flaticon-bag"></i><span>اضافة الى السلة</span></a>
							<a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
						</div>
					</div>
					<div class="pi-text">
						<h6>150 L.E</h6>
						<p>ترينج شتوي موديل أسد</p>
					</div>
				</div>
				<div class="product-item">
						<div class="pi-pic">
							<img src="{{url('public/img')}}/product/4.jpg" alt="">
							<div class="pi-links">
								<a href="#" class="add-card"><i class="flaticon-bag"></i><span>اضافة الى السلة</span></a>
								<a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
							</div>
						</div>
						<div class="pi-text">
							<h6>150 L.E</h6>
							<p>ترينج شتوي موديل أسد</p>
						</div>
					</div>
				<div class="product-item">
						<div class="pi-pic">
							<img src="{{url('public/img')}}/product/6.jpg" alt="">
							<div class="pi-links">
								<a href="#" class="add-card"><i class="flaticon-bag"></i><span>اضافة الى السلة</span></a>
								<a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
							</div>
						</div>
						<div class="pi-text">
							<h6>150 L.E</h6>
							<p>ترينج شتوي موديل أسد</p>
						</div>
					</div>
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
				<div class="col-lg-3 col-sm-6">
					<div class="product-item">
						<div class="pi-pic">
							<img src="{{url('public/img')}}/product/5.jpg" alt="">
							<div class="pi-links">
								<a href="#" class="add-card"><i class="flaticon-bag"></i><span>اضافة الى السلة</span></a>
								<a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
							</div>
						</div>
						<div class="pi-text">
							<h6>150 L.E</h6>
							<p>ترينج شتوي موديل أسد</p>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-sm-6">
					<div class="product-item">
						<div class="pi-pic">
							<div class="tag-sale">خصم 20%</div>
							<img src="{{url('public/img')}}/product/6.jpg" alt="">
							<div class="pi-links">
								<a href="#" class="add-card"><i class="flaticon-bag"></i><span>اضافة الى السلة</span></a>
								<a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
							</div>
						</div>
						<div class="pi-text">
							<h6>150 L.E</h6>
							<p>موديل صيفي موديل قطة</p>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-sm-6">
					<div class="product-item">
						<div class="pi-pic">
							<img src="{{url('public/img')}}/product/7.jpg" alt="">
							<div class="pi-links">
								<a href="#" class="add-card"><i class="flaticon-bag"></i><span>اضافة الى السلة</span></a>
								<a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
							</div>
						</div>
						<div class="pi-text">
							<h6>150 L.E</h6>
							<p>ترينج شتوي موديل أسد</p>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-sm-6">
					<div class="product-item">
						<div class="pi-pic">
							<img src="{{url('public/img')}}/product/8.jpg" alt="">
							<div class="pi-links">
								<a href="#" class="add-card"><i class="flaticon-bag"></i><span>اضافة الى السلة</span></a>
								<a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
							</div>
						</div>
						<div class="pi-text">
							<h6>150 L.E</h6>
							<p>ترينج شتوي موديل أسد</p>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-sm-6">
					<div class="product-item">
						<div class="pi-pic">
							<img src="{{url('public/img')}}/product/9.jpg" alt="">
							<div class="pi-links">
								<a href="#" class="add-card"><i class="flaticon-bag"></i><span>اضافة الى السلة</span></a>
								<a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
							</div>
						</div>
						<div class="pi-text">
							<h6>150 L.E</h6>
							<p>ترينج شتوي موديل أسد</p>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-sm-6">
					<div class="product-item">
						<div class="pi-pic">
							<img src="{{url('public/img')}}/product/10.jpg" alt="">
							<div class="pi-links">
								<a href="#" class="add-card"><i class="flaticon-bag"></i><span>اضافة الى السلة</span></a>
								<a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
							</div>
						</div>
						<div class="pi-text">
							<h6>150 L.E</h6>
							<p>موديل صيفي موديل قطة</p>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-sm-6">
					<div class="product-item">
						<div class="pi-pic">
							<img src="{{url('public/img')}}/product/11.jpg" alt="">
							<div class="pi-links">
								<a href="#" class="add-card"><i class="flaticon-bag"></i><span>اضافة الى السلة</span></a>
								<a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
							</div>
						</div>
						<div class="pi-text">
							<h6>150 L.E</h6>
							<p>ترينج شتوي موديل أسد</p>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-sm-6">
					<div class="product-item">
						<div class="pi-pic">
							<img src="{{url('public/img')}}/product/12.jpg" alt="">
							<div class="pi-links">
								<a href="#" class="add-card"><i class="flaticon-bag"></i><span>اضافة الى السلة</span></a>
								<a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
							</div>
						</div>
						<div class="pi-text">
							<h6>150 L.E</h6>
							<p>ترينج شتوي موديل أسد</p>
						</div>
					</div>
				</div>
			</div>
			<div class="text-center pt-5">
				<button class="site-btn sb-line sb-dark">عرض المزيد</button>
			</div>
		</div>
	</section>
	<!-- Product filter section end -->


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

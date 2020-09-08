@include('layout.header')
<body>
    @include('layout.navbar')
	<!-- product section -->
	<section class="product-section">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<div class="product-pic-zoom">
						<img class="product-big-img" src="{{url('public/img')}}/single-product/1.jpg" alt="">
					</div>
					<div class="product-thumbs" tabindex="1" style="overflow: hidden; outline: none;">
						<div class="product-thumbs-track">
							<div class="pt active" data-imgbigurl="{{url('public/img')}}/single-product/1.jpg"><img src="{{url('public/img')}}/single-product/thumb-1.jpg" alt=""></div>
							<div class="pt" data-imgbigurl="{{url('public/img')}}/single-product/2.jpg"><img src="{{url('public/img')}}/single-product/thumb-2.jpg" alt=""></div>
							<div class="pt" data-imgbigurl="{{url('public/img')}}/single-product/3.jpg"><img src="{{url('public/img')}}/single-product/thumb-3.jpg" alt=""></div>
							<div class="pt" data-imgbigurl="{{url('public/img')}}/single-product/4.jpg"><img src="{{url('public/img')}}/single-product/thumb-4.jpg" alt=""></div>
						</div>
					</div>
				</div>
				<div class="col-lg-6 product-details text-right">
					<h2 class="p-title">عنوان المنتج هنا</h2>
					<h3 class="p-price">150 L.E</h3>
					<h4 class="p-stock">متاح: <span>في المستودع</span></h4>
					<div class="p-rating mb-5">
						<i class="fa fa-star-o"></i>
						<i class="fa fa-star-o"></i>
						<i class="fa fa-star-o"></i>
						<i class="fa fa-star-o"></i>
						<i class="fa fa-star-o fa-fade"></i>
					</div>
					{{-- <div class="p-review text-right">
						<a href="">3 reviews</a>|<a href="">مراجعة المنت</a>
					</div> --}}
                    <p class="font-weight-bold">الحجم</p>
					<div class="fw-size-choose mb-5">
						<div class="sc-item">
							<input type="radio" name="sc" id="xs-size">
							<label for="xs-size">10</label>
						</div>
						<div class="sc-item">
							<input type="radio" name="sc" id="s-size">
							<label for="s-size">12</label>
						</div>
						<div class="sc-item">
							<input type="radio" name="sc" id="m-size" checked="">
							<label for="m-size">14</label>
						</div>
						<div class="sc-item disable">
							<input type="radio" name="sc" id="l-size" disabled>
							<label for="l-size">16</label>
						</div>
                    </div>
                    <p class="font-weight-bold">اللون</p>
					<div class="fw-size-choose mb-5">
						<div class="sc-item">
							<input type="radio" name="color" id="red">
							<label for="red" style="background:red;"></label>
						</div>
						<div class="sc-item disable">
							<input type="radio" name="color" id="green" disabled title="هذا اللون غير متوفر حالياً">
							<label for="green" style="background:green;" title="هذا اللون غير متوفر حالياً"></label>
						</div>
					</div>
                    <p class="font-weight-bold">الكمية المطلوبة</p>
					<div class="quantity">
                        <div class="pro-qty"><input type="text" value="1"></div>
                    </div>
					<a href="#" class="site-btn">اضف الى السلة</a>
					<div id="accordion" class="accordion-area">
						<div class="panel">
							<div class="panel-header" id="headingOne">
								<button class="panel-link active text-center" data-toggle="collapse" data-target="#collapse1" aria-expanded="true" aria-controls="collapse1">معلومات المنتج</button>
							</div>
							<div id="collapse1" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
								<div class="panel-body">
									<p>معلومات سريعة عن المنتج هنا</p>
									<p>بناتي</p>
									<p>10 سنة الى 16 سنة</p>
									<p>متاح بيع الجملة لهذا المنتج</p>
								</div>
							</div>
						</div>
						<div class="panel">
							<div class="panel-header" id="headingTwo">
								<button class="panel-link text-center" data-toggle="collapse" data-target="#collapse2" aria-expanded="false" aria-controls="collapse2">معلومات الدفع</button>
							</div>
							<div id="collapse2" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
								<div class="panel-body">
									<img src="{{url('public/img')}}/cards.png" alt="">
									<p>نقبل الدفع بجميع الأدوات السابقة</p>
								</div>
							</div>
						</div>
						<div class="panel">
							<div class="panel-header" id="headingThree">
								<button class="panel-link text-center" data-toggle="collapse" data-target="#collapse3" aria-expanded="false" aria-controls="collapse3">الشحن و الاسترجاع</button>
							</div>
							<div id="collapse3" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
								<div class="panel-body">
									<h4>يمكن الاسترجاع خلال 7 أيام من البيع</h4>
									<p>دفع عند الإسترجاع</p>
									<p>لا يقبل استرجاع المنتجات التالفة أو بحالتها غير الأصلية , تنطبق <a href="#">شروط الإسترجاع</a> على جميع المنتجات</p>
								</div>
							</div>
                        </div>
                        <div class="panel">
							<div class="panel-header" id="headingThree">
								<button class="panel-link text-center" data-toggle="collapse" data-target="#collapse4" aria-expanded="false" aria-controls="collapse4">شارك المنتج</button>
							</div>
							<div id="collapse4" class="collapse" aria-labelledby="headingFour" data-parent="#accordion">
								<div class="panel-body">
                                    <div class="social-sharing text-center">
                                        <a href=""><i class="fa fa-google-plus"></i></a>
                                        <a href=""><i class="fa fa-pinterest"></i></a>
                                        <a href=""><i class="fa fa-facebook"></i></a>
                                        <a href=""><i class="fa fa-twitter"></i></a>
                                        <a href=""><i class="fa fa-youtube"></i></a>
                                    </div>
								</div>
							</div>
						</div>
					</div>

				</div>
			</div>
		</div>
	</section>
	<!-- product section end -->


	<!-- RELATED PRODUCTS section -->
	<section class="related-product-section">
		<div class="container">
			<div class="section-title">
				<h2>منتجات مشابهة</h2>
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
						<p>بيجاما تصميم فيل</p>
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
						<p>بيجاما تصميم قطة</p>
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
						<p>بيجاما تصميم فيل</p>
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
							<p>بيجاما تصميم فيل</p>
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
						<p>بيجاما تصميم فيل</p>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- RELATED PRODUCTS section end -->
    @include('layout.footer')
    @include('layout.scripts')
	</body>
</html>

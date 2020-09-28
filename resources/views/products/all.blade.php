@include('layout.header')
<body>
    @include('layout.navbar')
    	<!-- Category section -->
	<section class="category-section spad">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 order-2 order-lg-1 text-right">
          <div class="filter-widget">
            <form class="search-form" action="#" method="post">
              <label for="search_term">بحث</label>
              <input id="search_term" type="text" placeholder="ادخل كلمة البحث هنا و اضغط Enter" name="search_term" value="">
              <button type="button" class="site-btn site-btn-sm" name="button">بحث</button>
            </form>
          </div>
					<div class="filter-widget">
						<h2 class="fw-title">الأقسام</h2>
						<ul class="category-menu">
              @forelse ($Categories as $Category)
                <li><a href="#">{{$Category->title}}</a>
								{{-- <ul class="sub-menu">
									<li><a href="#">0-4 سنوات </a></li>
									<li><a href="#">4-9 سنوات</a></li>
									<li><a href="#">10-16 سنة</a></li>
								</ul> --}}
							</li>
              @empty
              @endforelse
						</ul>
					</div>
					<div class="filter-widget">
						<h2 class="fw-title">فلترة النتائج</h2>
						<div class="price-range-wrap">
							<h4>السعر</h4>
              <div class="price-range ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content" data-min="10" data-max="270">
								<div class="ui-slider-range ui-corner-all ui-widget-header" style="left: 0%; width: 100%;"></div>
                                <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default" style="left: 0%;"></span>
								<span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default" style="left: 100%;"></span>
							</div>
							<div class="range-slider">
                                <div class="price-input">
                                    <input type="text" id="maxamount">
                                    <input type="text" id="minamount">
                                </div>
                            </div>
                        </div>
					</div>
					<div class="filter-widget">
						<h2 class="fw-title">الحجم</h2>
						<div class="fw-size-choose">
							<div class="sc-item">
								<input type="radio" name="sc" id="xs-size">
								<label for="xs-size">XS</label>
							</div>
							<div class="sc-item">
								<input type="radio" name="sc" id="s-size">
								<label for="s-size">S</label>
							</div>
							<div class="sc-item">
								<input type="radio" name="sc" id="m-size"  checked="">
								<label for="m-size">M</label>
							</div>
							<div class="sc-item">
								<input type="radio" name="sc" id="l-size">
								<label for="l-size">L</label>
							</div>
							<div class="sc-item">
								<input type="radio" name="sc" id="xl-size">
								<label for="xl-size">XL</label>
							</div>
							<div class="sc-item">
								<input type="radio" name="sc" id="xxl-size">
								<label for="xxl-size">XXL</label>
							</div>
						</div>
                    </div>
                </div>

				<div class="col-lg-9  order-1 order-lg-2 mb-5 mb-lg-0">
					<div class="row">
						<div class="col-lg-4 col-sm-6">
							<div class="product-item">
								<div class="pi-pic">
									<div class="tag-sale">عرض خاص</div>
									<img src="{{url('public/img')}}/product/6.jpg" alt="">
									<div class="pi-links">
										<a href="#" class="add-card"><i class="flaticon-bag"></i><span>أضف الى السلة</span></a>
										<a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
									</div>
								</div>
								<div class="pi-text">
									<h6>150 L.E</h6>
									<p>بيجاما موديل قطة</p>
								</div>
							</div>
						</div>
						<div class="col-lg-4 col-sm-6">
							<div class="product-item">
								<div class="pi-pic">
									<img src="{{url('public/img')}}/product/7.jpg" alt="">
									<div class="pi-links">
										<a href="#" class="add-card"><i class="flaticon-bag"></i><span>أضف الى السلة</span></a>
										<a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
									</div>
								</div>
								<div class="pi-text">
									<h6>150 L.E</h6>
									<p>بيجاما موديل أسد حجم كبير اختبار للنص الطويل في اسم المنتج</p>
								</div>
							</div>
						</div>
						<div class="col-lg-4 col-sm-6">
							<div class="product-item">
								<div class="pi-pic">
									<img src="{{url('public/img')}}/product/8.jpg" alt="">
									<div class="pi-links">
										<a href="#" class="add-card"><i class="flaticon-bag"></i><span>أضف الى السلة</span></a>
										<a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
									</div>
								</div>
								<div class="pi-text">
									<h6>150 L.E</h6>
									<p>بيجاما موديل أسد</p>
								</div>
							</div>
						</div>
						<div class="col-lg-4 col-sm-6">
							<div class="product-item">
								<div class="pi-pic">
									<img src="{{url('public/img')}}/product/10.jpg" alt="">
									<div class="pi-links">
										<a href="#" class="add-card"><i class="flaticon-bag"></i><span>أضف الى السلة</span></a>
										<a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
									</div>
								</div>
								<div class="pi-text">
									<h6>150 L.E</h6>
									<p>بيجاما موديل قطة</p>
								</div>
							</div>
						</div>
						<div class="col-lg-4 col-sm-6">
							<div class="product-item">
								<div class="pi-pic">
									<img src="{{url('public/img')}}/product/11.jpg" alt="">
									<div class="pi-links">
										<a href="#" class="add-card"><i class="flaticon-bag"></i><span>أضف الى السلة</span></a>
										<a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
									</div>
								</div>
								<div class="pi-text">
									<h6>150 L.E</h6>
									<p>بيجاما موديل أسد حجم كبير اختبار للنص الطويل في اسم المنتج</p>
								</div>
							</div>
						</div>
						<div class="col-lg-4 col-sm-6">
							<div class="product-item">
								<div class="pi-pic">
									<img src="{{url('public/img')}}/product/12.jpg" alt="">
									<div class="pi-links">
										<a href="#" class="add-card"><i class="flaticon-bag"></i><span>أضف الى السلة</span></a>
										<a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
									</div>
								</div>
								<div class="pi-text">
									<h6>150 L.E</h6>
									<p>بيجاما موديل أسد</p>
								</div>
							</div>
						</div>
						<div class="col-lg-4 col-sm-6">
							<div class="product-item">
								<div class="pi-pic">
									<img src="{{url('public/img')}}/product/5.jpg" alt="">
									<div class="pi-links">
										<a href="#" class="add-card"><i class="flaticon-bag"></i><span>أضف الى السلة</span></a>
										<a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
									</div>
								</div>
								<div class="pi-text">
									<h6>150 L.E</h6>
									<p>بيجاما موديل أسد حجم كبير اختبار للنص الطويل في اسم المنتج</p>
								</div>
							</div>
						</div>
						<div class="col-lg-4 col-sm-6">
							<div class="product-item">
								<div class="pi-pic">
									<img src="{{url('public/img')}}/product/9.jpg" alt="">
									<div class="pi-links">
										<a href="#" class="add-card"><i class="flaticon-bag"></i><span>أضف الى السلة</span></a>
										<a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
									</div>
								</div>
								<div class="pi-text">
									<h6>150 L.E</h6>
									<p>بيجاما موديل أسد حجم كبير اختبار للنص الطويل في اسم المنتج</p>
								</div>
							</div>
						</div>
						<div class="col-lg-4 col-sm-6">
							<div class="product-item">
								<div class="pi-pic">
									<img src="{{url('public/img')}}/product/1.jpg" alt="">
									<div class="pi-links">
										<a href="#" class="add-card"><i class="flaticon-bag"></i><span>أضف الى السلة</span></a>
										<a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
									</div>
								</div>
								<div class="pi-text">
									<h6>150 L.E</h6>
									<p>بيجاما موديل أسد</p>
								</div>
							</div>
						</div>
						<div class="col-lg-4 col-sm-6">
							<div class="product-item">
								<div class="pi-pic">
									<div class="tag-new">new</div>
									<img src="{{url('public/img')}}/product/2.jpg" alt="">
									<div class="pi-links">
										<a href="#" class="add-card"><i class="flaticon-bag"></i><span>أضف الى السلة</span></a>
										<a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
									</div>
								</div>
								<div class="pi-text">
									<h6>150 L.E</h6>
									<p>بيجاما موديل قطة</p>
								</div>
							</div>
						</div>
						<div class="col-lg-4 col-sm-6">
							<div class="product-item">
								<div class="pi-pic">
									<img src="{{url('public/img')}}/product/3.jpg" alt="">
									<div class="pi-links">
										<a href="#" class="add-card"><i class="flaticon-bag"></i><span>أضف الى السلة</span></a>
										<a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
									</div>
								</div>
								<div class="pi-text">
									<h6>150 L.E</h6>
									<p>بيجاما موديل أسد</p>
								</div>
							</div>
						</div>
						<div class="col-lg-4 col-sm-6">
							<div class="product-item">
								<div class="pi-pic">
									<img src="{{url('public/img')}}/product/4.jpg" alt="">
									<div class="pi-links">
										<a href="#" class="add-card"><i class="flaticon-bag"></i><span>أضف الى السلة</span></a>
										<a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
									</div>
								</div>
								<div class="pi-text">
									<h6>150 L.E</h6>
									<p>بيجاما موديل أسد</p>
								</div>
							</div>
						</div>
						<div class="text-center w-100 pt-3">
							<button class="site-btn sb-line sb-dark">تحميل المزيد</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Category section end -->
    @include('layout.footer')
    @include('layout.scripts')
	</body>
</html>

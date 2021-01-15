@include('layout.header')
<body>
    @include('layout.navbar')
	<!-- checkout section  -->
	<section class="checkout-section spad text-right">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 order-2 order-lg-1">
					<form class="checkout-form">
						<div class="cf-title">معلومات الدفع</div>
						<div class="row address-inputs">
							<div class="col-md-12">
								<input type="text" placeholder="الاسم الكامل">
								<input type="text" placeholder="رقم الهاتف">
								<input type="text" placeholder="رقم هاتف بديل">
								<input type="text" placeholder="البريد الإلكتروني">
							</div>
							<div class="col-md-6">
                                <input type="text" placeholder="المدينة">
                            </div>
							<div class="col-md-6">
                                <input type="text" placeholder="الرمز البريدي">
                            </div>
                            <div class="col-md-12">
                                <input type="text" placeholder="العنوان">
                            </div>
						</div>
						<div class="cf-title">التوصيل</div>
						<div class="row shipping-btns">
							<div class="col-6">
								<h4>عادي</h4>
							</div>
							<div class="col-6">
								<div class="cf-radio-btns">
									<div class="cfr-item">
										<input type="radio" name="shipping" id="ship-1">
										<label for="ship-1">مجاناً</label>
									</div>
								</div>
							</div>
							<div class="col-6">
								<h4>توصيل في اليوم التالي</h4>
							</div>
							<div class="col-6">
								<div class="cf-radio-btns">
									<div class="cfr-item">
										<input type="radio" name="shipping" id="ship-2">
										<label for="ship-2">25 L.E</label>
									</div>
								</div>
							</div>
						</div>
						<div class="cf-title">الدفع</div>
						<ul class="payment-list">
							<li><a href="#"><img src="{{url('public/img')}}/paypal.png" alt=""></a>بايبال</li>
							<li><a href="#"><img src="{{url('public/img')}}/mastercart.png" alt=""></a>بطاقة فيزا</li>
							<li>دفع عند الاستلام</li>
						</ul>
						<button class="site-btn submit-order-btn">تأكيد الطلب</button>
					</form>
				</div>
				<div class="col-lg-4 order-1 order-lg-2">
					<div class="checkout-cart">
						<h3>سلة المشتريات</h3>
						<ul class="product-list">
							<li>
								<div class="pl-thumb"><img src="{{url('public/img')}}/cart/1.jpg" alt=""></div>
								<h6>بيجاما موديل قطة</h6>
								<p>الكمية : X1</p>
								<p>150 L.E</p>
							</li>
							<li>
								<div class="pl-thumb"><img src="{{url('public/img')}}/cart/2.jpg" alt=""></div>
                                <h6>بيجاما موديل قطة</h6>
                                <p>الكمية : X1</p>
								<p>150 L.E</p>
							</li>
						</ul>
						<ul class="price-list">
							<li>اجمالي المشتريات :<span>300 L.E</span></li>
							<li>تكلفة التوصيل :<span>مجاني</span></li>
							<li class="total">الاجمالي : <span>300 L.E</span></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- checkout section end -->
    @include('layout.footer')
    @include('layout.scripts')
	</body>
</html>

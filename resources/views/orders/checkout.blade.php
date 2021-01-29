@include('layout.header')
<body>
		@include('layout.navbar')
    @include('layout.errors')
	<!-- checkout section  -->
	<section class="checkout-section spad text-right">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 order-2 order-lg-1">
					<form class="checkout-form" action="{{route('orders.checkout.post')}}" method="post">
						@csrf
						<input hidden name="total_amount" value="{{$CartTotal}}">
						<div class="cf-title">معلومات الدفع</div>
						<div class="row address-inputs">
							<div class="col-md-12">
								<input required type="text" name="name" placeholder="الاسم الكامل" value="{{old('name') ?? auth()->user()->name}}">
								<input required type="text" name="phone_number" placeholder="رقم الهاتف" value="{{old('phone_number') ?? auth()->user()->phone_number}}">
								<input required type="text" name="phone_number_2" placeholder="رقم هاتف بديل" value="{{old('phone_number_2') ?? ''}}">
								<input required type="text" name="email" placeholder="البريد الإلكتروني" value="{{old('email') ?? auth()->user()->email}}">
								<input required type="text" name="email_confirmation" placeholder="تأكيد البريد الإلكتروني" value="{{old('email_conf') ?? ''}}">
							</div>
							<div class="col-md-12"><input required type="text" name="province" placeholder="المحافظة" value="{{old('province') ?? auth()->user()->province}}"></div>
							<div class="col-md-6"><input required name="city" type="text" placeholder="المدينة" value="{{old('city') ?? auth()->user()->city}}"></div>
							<div class="col-md-6"><input required name="zip_code" type="text" placeholder="الرمز البريدي" value="{{old('zip_code') ?? auth()->user()->zip_code}}"></div>
              <div class="col-md-12"><input required type="text" name="street_address" placeholder="العنوان" value="{{old('street_address') ?? auth()->user()->street_address}}"></div>
						</div>
						<div class="cf-title">معلومات الشحن</div>
						<div class="row shipping-btns">
							<div class="col-md-12"><input required type="text" name="shipping_province" placeholder="المحافظة" value="{{old('province') ?? auth()->user()->province}}"></div>
							<div class="col-md-6"><input required name="shipping_city" type="text" placeholder="المدينة" value="{{old('city') ?? auth()->user()->city}}"></div>
							<div class="col-md-6"><input required name="shipping_zip_code" type="text" placeholder="الرمز البريدي" value="{{old('zip_code') ?? auth()->user()->zip_code}}"></div>
							<div class="col-md-12"><input required type="text" name="shipping_street_address" placeholder="العنوان" value="{{old('street_address') ?? auth()->user()->street_address}}"></div>
						</div>
						<div class="cf-title">معلومات اضافية</div>
						<div class="row shipping-btns">
							<div class="col-md-12">
								<textarea placeholder="ملاحظات اضافية" name="order_notes" rows="5">{{old('order_notes') ?? ''}}</textarea>
							</div>
						</div>
						<div class="cf-title">طريقة الدفع</div>
						<ul class="payment-list">
							<li><input type="radio" name="payment_method" required id="credit-card" value="credit-card"> <label for="credit-card"><i class="fas fa-credit-card"></i> بطاقة الائتمان </label></li>
							<li><input type="radio" name="payment_method" required id="vodafone-cash" value="vodafone-cash"> <label for="vodafone-cash"><i class="fas fa-mobile-alt"></i> فودافون كاش </label></li>
							<li><input type="radio" name="payment_method" required id="pod" value="pod"> <label for="pod"><i class="fas fa-truck-pickup"></i> دفع عند الاستلام </label></li>
						</ul>
						<button class="site-btn submit-order-btn">تأكيد الطلب</button>
					</form>
				</div>
				<div class="col-lg-4 order-1 order-lg-2">
					<div class="checkout-cart">
						<h3>قيمة المشتريات</h3>
						<ul class="price-list">
							<li>قيمة المشتريات :<span>{{$CartOrigin}} L.E</span></li>
							@if($HasCoupon)
								<li class="text-success">{{$TheCoupon->coupoun_code}}<br><b>خصم {{$TheCoupon->discount_amount.' '.$TheCoupon->TypeSymbole()}}</b> </li>
							@endif
							<li>اجمالي المشتريات :<span>{{$CartTotal}} L.E</span></li>
							<li>تكلفة التوصيل :<span>مجاني</span></li>
							<li class="total">الاجمالي : <span>{{$CartTotal}} L.E</span></li>
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

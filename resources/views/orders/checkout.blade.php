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
						<div class="cf-title">بيانات العميل</div>
						<p>يرجى تزويدنا بالبيانات التالية لنتمكن من الاتصال بك عند تجهيز الطلب</p>
						<div class="row address-inputs">
							<div class="col-md-12">
								<input required type="text" name="name" placeholder="الاسم الكامل (مطلوب)" value="{{old('name') ?? auth()->user()->name}}">
								<input required type="text" name="phone_number" placeholder="رقم الهاتف (مطلوب)" value="{{old('phone_number') ?? auth()->user()->phone_number}}">
								<input required type="text" name="email" placeholder="البريد الإلكتروني (مطلوب)" value="{{old('email') ?? auth()->user()->email}}">
							</div>
							<div class="col-md-12"><input required type="text" name="province" placeholder="المحافظة (مطلوب)" value="{{old('province') ?? auth()->user()->province}}"></div>
							<div class="col-md-12"><input required name="city" type="text" placeholder="المدينة (مطلوب)" value="{{old('city') ?? auth()->user()->city}}"></div>
							<div class="col-md-12"><input required type="text" name="street_address" placeholder="العنوان التفصيلي (مطلوب)" value="{{old('street_address') ?? auth()->user()->street_address}}"></div>
						</div>
						<div class="cf-title">معلومات اضافية</div>
						<div class="row shipping-btns">
							<div class="col-md-12">
								<textarea placeholder="هل لديك أي ملاحظات اضافية تود اعلامنا بها؟" name="order_notes" rows="5">{{old('order_notes') ?? ''}}</textarea>
							</div>
						</div>
						<div class="cf-title">طريقة الدفع</div>
						<p>يرجى اختيار طريقة الدفع الأنسب لك, ان كنت غير متأكد من الاختيار المناسب يمكنك اختيار "الدفع عند الاستلام"</p>
						<ul class="payment-list">
							<li><input type="radio" name="payment_method" required id="credit-card" value="credit-card"> <label for="credit-card"><i class="fas fa-credit-card"></i> بطاقة الائتمان </label></li>
							<li><input type="radio" name="payment_method" required id="vodafone-cash" value="vodafone-cash"> <label for="vodafone-cash"><i class="fas fa-mobile-alt"></i> فودافون كاش </label></li>
							<li><input type="radio" name="payment_method" required id="pod" value="pod" checked> <label for="pod"><i class="fas fa-truck-pickup"></i> دفع عند الاستلام </label></li>
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

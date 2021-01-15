@include('layout.header' , ['pageTitle' => 'انشاء حساب جديد'])
<body>
    @include('layout.navbar')
    @include('layout.errors')
    <!-- Hero section -->
	<section class="trace-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="trace-order-form mb-5">
                        <h4>رقم التتبع</h4>
                        <p>يرجى ادخال رقم التتبع الخاص بطلبك, يمكنك الحصول على رقم التتبع من ملفك الشخصي أو من البريد الإلكتروني الذي تم ارساله اليك عند انشاء الطلب</p>
                        <form>
                          <input type="number" hidden name="user_id" value="{{auth()->user()->id ?? 0}}">
                          <input type="number" name="tracking_number" id="tracking-number" maxlength="4" placeholder="يتكون رقم التتبع من 8 خانات رقمية, مثال 12345678">
                            <button type="submit" id="trace-order-form" data-target="{{route('order.trace.post')}}"><i class="fas fa-search"></i></button>
                        </form>
                    </div>
                    <div class="trace-order-result">
                      
                    </div>
                </div>
            </div>
       
	</section>
    <!-- Hero section end -->
    @include('layout.scripts')
</body>
</html>

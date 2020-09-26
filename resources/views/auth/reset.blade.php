@include('layout.header' , ['pageTitle' => 'اعادة تعيين كلمة المرور'])
<body>
    @include('layout.navbar')
    @include('layout.errors')
    <!-- Hero section -->
	<section class="hero-section auth-hero">
        <div class="dark-overlap">
        <div class="container">
            <div class="row">
                <div class="col-12">
                        <h1>استعادة كلمة المرور</h1>
                        <p>لا تستطيع الدخول الى حسابك؟ يمكننا مساعدتك</p>
                    </div>
                </div>
            </div>
        </div>
	</section>
    <!-- Hero section end -->
    <!-- auth Form Start -->
    <section class="auth-form spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-12 offset-lg-2 offset-md-2 mb-5 mb-lg-0">
                    <form action="{{route('reset.post')}}" method="post">
                        @csrf
                        <h4>اعادة تعيين كلمة المرور</h4>
                        <div class="form-input-container">
                            <i class="fas fa-user"></i>
                            <input type="email" id="email" placeholder="أدخل بريدك الإلكتروني هنا" name="email" required>
                        </div>
                        <button class="site-btn mb-5">ارسال</button>
                    </form>
                </div>
                <div class="col-lg-4 col-12">
                    <div class="no-account-box">
                            <h4>كيف ذلك؟</h4>
                            <p>في حال وجدنا أن البريد الإلكتروني مرتبط بحساب ما على الموقع, سنقوم بارسال رسالة مع رابط اعادة تعيين كلمة المرور و يمكنك اختيار كلمة مرور جديدة من هناك</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- auth Form End -->
    @include('layout.scripts')
    <script src="{{url('public/js/')}}/auth.js"></script>
</body>
</html>

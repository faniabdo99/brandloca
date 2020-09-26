@include('layout.header' , ['pageTitle' => 'تسجيل الدخول'])
<body>
    @include('layout.navbar')
    @include('layout.errors')
    <!-- Hero section -->
	<section class="hero-section auth-hero">
        <div class="dark-overlap">
        <div class="container">
            <div class="row">
                <div class="col-12">
                        <h1>تسجيل الدخول</h1>
                        <p>مرحباً بعودتك , يمكنك تسجيل الدخول الى حسابك من هنا</p>
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
                    <form action="{{route('login.post')}}" method="post">
                        @csrf
                        <h4>تسجيل الدخول</h4>
                        <div class="form-input-container">
                            <i class="fas fa-user"></i>
                            <input type="email" id="email" placeholder="أدخل بريدك الإلكتروني هنا" name="email" required>
                        </div>
                        <div class="form-input-container">
                            <i class="fas fa-lock"></i>
                            <input type="password" id="password" placeholder="أدخل كلمة المرور هنا" name="password" required>
                        </div>
                        <div class="text-right mb-5">
                            <input type="checkbox" value="yes" name="save_login" id="save-login"> <label for="save-login">تذكرني في المرة القادمة</label>
                        </div>
                        <p class="text-right">نسيت كلمة المرور ؟ <a href="{{route('reset.get')}}">اضغط هنا</a></p>
                        <button class="site-btn mb-5">تسجيل الدخول</button>
                        <p class="text-right">تسجيل الدخول بواسطة :</p>
                        <ul class="social-auth">
                          <li class="auth-with-google"><a href="{{route('login.social','google')}}"><i class="fab fa-google"></i> جوجل</a></li>
                          <li class="auth-with-facebook"><a href="{{route('login.social','facebook')}}"><i class="fab fa-facebook"></i> فيسبوك</a></li>
                          <li class="auth-with-twitter"><a href="{{route('login.social','twitter')}}"><i class="fab fa-twitter"></i> تويتر</a></li>
                        </ul>
                    </form>
                </div>
                <div class="col-lg-4 col-12">
                    <div class="no-account-box">
                            <h4>ليس لديك حساب ؟</h4>
                            <p>استمتع بخصم 50% على أول عملية شراء لك بعد تسجيلك لحساب مجاني !</p>
                            <a href="{{route('signup.get')}}" class="site-btn sb-dark">سجل الآن</a>
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

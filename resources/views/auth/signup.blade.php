@include('layout.header' , ['pageTitle' => 'انشاء حساب جديد'])
<body>
    @include('layout.navbar')
    @include('layout.errors')
    <!-- Hero section -->
	<section class="hero-section auth-hero">
        <div class="dark-overlap">
        <div class="container">
            <div class="row">
                <div class="col-12">
                        <h1>تسجيل حساب جديد</h1>
                        <p>احصل على خصم 50% على أول عملية شراء من حسابك الجديد !</p>
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
                    <form action="{{route('signup.post')}}" method="post">
                        @csrf
                        <h4>انشاء حساب جديد</h4>
                        <div class="form-input-container">
                            <i class="fas fa-user"></i>
                            <input type="text" placeholder="الاسم الأول" name="first_name" required>
                        </div>
                        <div class="form-input-container">
                            <i class="fas fa-user-tie"></i>
                            <input type="text" placeholder="الكنية / النسبة" name="last_name" required>
                        </div>
                        <div class="form-input-container">
                            <i class="fas fa-envelope"></i>
                            <input type="email" placeholder="البريد الإلكتروني" name="email" required>
                        </div>
                        <div class="form-input-container">
                            <i class="fas fa-unlock"></i>
                            <input type="password" placeholder="كلمة المرور" name="password" required>
                        </div>
                        <div class="form-input-container">
                            <i class="fas fa-lock"></i>
                            <input type="password" placeholder="تأكيد كلمة المرور" name="password_confirmation" required>
                        </div>
                        <button class="site-btn mb-5">انشاء حساب</button>
                        <p class="text-right">انشاء حساب بواسطة :</p>
                        <ul class="social-auth">
                            <li class="auth-with-google"><a href="#"><i class="fab fa-google"></i> جوجل</a></li>
                            <li class="auth-with-facebook"><a href="#"><i class="fab fa-facebook"></i> فيسبوك</a></li>
                            <li class="auth-with-twitter"><a href="#"><i class="fab fa-twitter"></i> تويتر</a></li>
                        </ul>
                    </form>
                </div>
                <div class="col-lg-4 col-12">
                    <div class="no-account-box">
                            <h4>لديك حساب ؟</h4>
                            <p>قم بتسجيل الدخول الى حسابك</p>
                            <a href="{{route('login.get')}}" class="site-btn sb-dark">تسجيل الدخول</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- auth Form End -->
    @include('layout.scripts')
</body>
</html>

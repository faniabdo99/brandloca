@include('layout.header' , ['pageTitle' => 'اختيار كلمة المرور الجديدة'])
<body>
    @include('layout.navbar')
    @include('layout.errors')
    <!-- Hero section -->
	<section class="hero-section auth-hero">
        <div class="dark-overlap">
        <div class="container">
            <div class="row">
                <div class="col-12">
                        <h1>اختر كلمة المرور</h1>
                        <p>يرجى اختيار كلمة المرور الجديدة لحسابك من هنا</p>
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
                    <form action="{{route('reset.choosePassword.post')}}" method="post">
                        @csrf
                        <h4>اعادة تعيين كلمة المرور</h4>
                        <input hidden type="number" name="user_id" value="{{$TheUser->id}}">
                        <input hidden type="text" name="user_code" value="{{md5($TheUser->code)}}">
                        <div class="form-input-container">
                            <i class="fas fa-user"></i>
                            <input type="password" id="password" placeholder="كلمة المرور" name="password" required>
                        </div>
                        <div class="form-input-container">
                            <i class="fas fa-user"></i>
                            <input type="password" id="password_confirmation" placeholder="تأكيد كلمة المرور" name="password_confirmation" required>
                        </div>
                        <button class="site-btn mb-5">تحديث</button>
                    </form>
                </div>
                <div class="col-lg-4 col-12">
                    <div class="no-account-box">
                            <h4>مرحباً بعودتك</h4>
                            <p>يمكنك تغيير كلمة المرور الخاصة بك هنا, تأكد من اختيار كلمة مرور قوية لضمان أمن حسابك</p>
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

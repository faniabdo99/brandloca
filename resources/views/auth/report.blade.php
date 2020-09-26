@include('layout.header' , ['pageTitle' => 'ابلاغ عن مشكلة'])
<body>
    @include('layout.navbar')
    @include('layout.errors')
    <!-- Hero section -->
	<section class="profile-section">
        <div class="container">
            <div class="row">
                @include('auth.profile-sidebar')
                <div class="col-lg-8">
                    <div class="user-account-report-form mb-5">
                        <form>
                            <label for="subject">عنوان الرسالة *</label>
                            <input type="text" name="subject" id="subject" placeholder="عنوان الرسالة" required>
                            <label for="message">ما هي المشكلة التي واجهتك ؟ *</label>
                            <textarea name="message" id="message" rows="8" placeholder="يمكنك كتابة شرح مطول عن المشكلة هنا" required></textarea>
                            <button class="site-btn" id="account-report-form-submit" data-action="{{route('profile.report.post')}}" type="submit">ارسال</button>
                        </form>
                    </div>
                    <div class="user-account-report">
                        <ul>
                            <li><i class="text-primary fa fa-envelope"></i> <a href="mailto:email@domain.com">support@arteonline.com</a></li>
                            <li><i class="text-primary fa fa-phone"></i> <a dir="ltr" href="tel:01151411867">+20 115 141 1867</a></li>
                            <li><i class="text-primary fa fa-map-marker"></i> جسر السويس , شارع جمال عبد الناصر</li>
                        </ul>
                    </div>
                </div>
            </div>

	</section>
    <!-- Hero section end -->
    @include('layout.footer')
    @include('layout.scripts')
    <script src="{{url('public/js/')}}/auth.js"></script>
</body>
</html>

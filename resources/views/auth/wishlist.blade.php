@include('layout.header' , ['pageTitle' => 'المفضلة'])
<body>
    @include('layout.navbar')
    @include('layout.errors')
    <!-- Hero section -->
	<section class="profile-section">
        <div class="container">
            <div class="row">
                @include('auth.profile-sidebar')
                <div class="col-lg-8">
                    <div class="user-account-wishlist">
                        <h4 class="mb-4">العناصر المفضلة</h4>
                        <div class="row">
                            <div class="col-lg-6 col-12 product-item">
                                <div class="pi-pic">
                                    <img src="{{url('public/img')}}/product/1.jpg" alt="">
                                    <div class="pi-links">
                                        <a href="#" class="add-card"><i class="flaticon-bag"></i><span>اضافة الى السلة</span></a>
                                        <a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
                                    </div>
                                </div>
                                <div class="pi-text">
                                    <h6>150 L.E</h6>
                                    <p>ترينج شتوي موديل أسد</p>
                                </div>
                            </div>
                            <div class="col-lg-6 col-12 product-item">
                                <div class="pi-pic">
                                    <div class="tag-new">جديد</div>
                                    <img src="{{url('public/img')}}/product/2.jpg" alt="">
                                    <div class="pi-links">
                                        <a href="#" class="add-card"><i class="flaticon-bag"></i><span>اضافة الى السلة</span></a>
                                        <a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
                                    </div>
                                </div>
                                <div class="pi-text">
                                    <h6>150 L.E</h6>
                                    <p>موديل صيفي موديل قطة</p>
                                </div>
                            </div>
                            <div class="col-lg-6 col-12 product-item">
                                <div class="pi-pic">
                                    <img src="{{url('public/img')}}/product/3.jpg" alt="">
                                    <div class="pi-links">
                                        <a href="#" class="add-card"><i class="flaticon-bag"></i><span>اضافة الى السلة</span></a>
                                        <a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
                                    </div>
                                </div>
                                <div class="pi-text">
                                    <h6>150 L.E</h6>
                                    <p>ترينج شتوي موديل أسد</p>
                                </div>
                            </div>
                            <div class="col-lg-6 col-12 product-item">
                                    <div class="pi-pic">
                                        <img src="{{url('public/img')}}/product/4.jpg" alt="">
                                        <div class="pi-links">
                                            <a href="#" class="add-card"><i class="flaticon-bag"></i><span>اضافة الى السلة</span></a>
                                            <a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
                                        </div>
                                    </div>
                                    <div class="pi-text">
                                        <h6>150 L.E</h6>
                                        <p>ترينج شتوي موديل أسد</p>
                                    </div>
                                </div>
                            <div class="col-lg-6 col-12 product-item">
                                    <div class="pi-pic">
                                        <img src="{{url('public/img')}}/product/6.jpg" alt="">
                                        <div class="pi-links">
                                            <a href="#" class="add-card"><i class="flaticon-bag"></i><span>اضافة الى السلة</span></a>
                                            <a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
                                        </div>
                                    </div>
                                    <div class="pi-text">
                                        <h6>150 L.E</h6>
                                        <p>ترينج شتوي موديل أسد</p>
                                    </div>
                                </div>
                        </div>
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

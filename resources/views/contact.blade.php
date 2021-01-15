@include('layout.header' , ['pageTitle' => 'اتصل بنا'])

<body>
    @include('layout.navbar')
    @include('layout.errors')
    <!-- Contact section -->
    <section class="contact-section">
        <div class="container">
            <div class="row">
                <div class="col-12 text-right contact-info">
                    <h3>تواصل معنا</h3>
                    <p>جسر السويس , شارع جمال عبد الناصر</p>
                    <p dir="ltr">0020 115 1411 867</p>
                    <p>support@arteonline.com</p>
                    <div class="contact-social">
                        <a href="#"><i class="fa fa-youtube"></i></a>
                        <a href="#"><i class="fa fa-instagram"></i></a>
                        <a href="#"><i class="fa fa-facebook"></i></a>
                        <a href="#"><i class="fa fa-twitter"></i></a>
                    </div>
                    <form action="{{route('contact.post')}}" method="post" class="contact-form">
                        @csrf
                        <input required type="text" name="name" placeholder="الاسم">
                        <input required type="email" name="email" placeholder="البريد الإلكتروني">
                        <input required type="text" name="subject" placeholder="عنوان الرسالة">
                        <textarea required name="message" placeholder="الرسالة"></textarea>
                        <button type="submit" class="site-btn">ارسال</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact section end -->


    <!-- Related product section -->
    <section class="related-product-section spad">
        <div class="container">
            <div class="section-title">
                <h2>منتجات مميزة</h2>
            </div>
            <div class="row">
                <div class="col-lg-3 col-sm-6">
                    <div class="product-item">
                        <div class="pi-pic">
                            <div class="tag-new">جديد</div>
                            <img src="{{url('public/img')}}/product/2.jpg" alt="">
                            <div class="pi-links">
                                <a href="#" class="add-card"><i class="flaticon-bag"></i><span>اضافة الى
                                        السلة</span></a>
                                <a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
                            </div>
                        </div>
                        <div class="pi-text">
                            <h6>150 L.E</h6>
                            <p>بيجاما موديل قطة</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="product-item">
                        <div class="pi-pic">
                            <img src="{{url('public/img')}}/product/5.jpg" alt="">
                            <div class="pi-links">
                                <a href="#" class="add-card"><i class="flaticon-bag"></i><span>اضافة الى
                                        السلة</span></a>
                                <a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
                            </div>
                        </div>
                        <div class="pi-text">
                            <h6>150 L.E</h6>
                            <p>بيجاما موديل قطة</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="product-item">
                        <div class="pi-pic">
                            <img src="{{url('public/img')}}/product/9.jpg" alt="">
                            <div class="pi-links">
                                <a href="#" class="add-card"><i class="flaticon-bag"></i><span>اضافة الى
                                        السلة</span></a>
                                <a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
                            </div>
                        </div>
                        <div class="pi-text">
                            <h6>150 L.E</h6>
                            <p>بيجاما موديل قطة</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="product-item">
                        <div class="pi-pic">
                            <img src="{{url('public/img')}}/product/1.jpg" alt="">
                            <div class="pi-links">
                                <a href="#" class="add-card"><i class="flaticon-bag"></i><span>اضافة الى
                                        السلة</span></a>
                                <a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
                            </div>
                        </div>
                        <div class="pi-text">
                            <h6>150 L.E</h6>
                            <p>بيجاما موديل قطة</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Related product section end -->
    @include('layout.footer')
    @include('layout.scripts')
</body>

</html>

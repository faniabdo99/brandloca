@include('layout.header' , ['PageTitle' => 'عن Arte'])

<body>
    @include('layout.navbar')
    <!-- Hero section -->
    <section class="hero-section" id="about-us-hero">
        <div class="dark-overlap">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h1>Arte Kids للملابس الجاهزة</h1>
                        <p>تشكيلة متجددة من الملابس من عمر 6 أشهر و حتى 16 سنة</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero section end -->
    <!-- Privacy Policy section -->
    <section class="static-content-section about-us-content">
        <div class="container">
            <div class="row about-company-section mb-5">
                <div class="col-lg-8 col-12">
                    <h2>عن الشركة</h2>
                    <p>على مدى ال 15 سنة الفائتة, استمرت شركة Arte Kids للملابس الجاهزة بامداد الأسواق بمنتجات عالية
                        الجودة, تطورت منتجات الشركة خلال الفترة السابقة لتشمل جميع احتياجات الأطفال من عمر 6 أشهر و حتى
                        16 سنة</p>
                    <p>خلال 15 سنة من العمل المتواصل , أنشئت شركة Arte Kids قاعدة متوسعة من المنتجات المميزة و العلامات
                        التجارية الوليدة ك White Card و Enigma</p>
                </div>
                <div class="col-lg-4 col-12 mb-5 mb-lg-0">
                    <img src="{{url('public')}}/images/pwa-logo/icon-192x192.png" class="img-circle d-block mx-auto" alt="Arte Logo" title="شعار شركة Arte" />
                </div>
            </div>
            <div class="branches-list-container">
                <div class="row mb-4">
                    <div class="col-12">
                        <h2 class="mb-0">فروعنا</h2>
                        <p>اضافة الى تجربة التسوق أونلاين المميزة التي نقدمها, نتشرف بزيارتكم لأقرب منفذ بيع في العناوين التالية</p>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-lg-4 col-12 mb-5 mb-lg-0">
                        <h3>جسر السويس <small class="badge-brand">جملة</small></h3>
                        <ul class="branch-info-list">
                            <li><i class="fas fa-map-marker-alt"></i> 142 شارع الصفا</li>
                            <li><i class="fas fa-phone"></i> <a dir="ltr" href="tel:00201027099000">0102 7099 000</a></li>
                            <li><i class="fas fa-phone"></i> <a dir="ltr" href="tel:00201061555638">0106 1555 638</a></li>
                        </ul>
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d1725.1759708123468!2d31.3932584!3d30.1413524!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMzDCsDA4JzI4LjkiTiAzMcKwMjMnMzcuNyJF!5e0!3m2!1sen!2seg!4v1611956101930!5m2!1sen!2seg"
                            frameborder="0" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                    </div>
                    <div class="col-lg-4 col-12 mb-5 mb-lg-0">
                        <h3>6 أكتوبر <small class="badge-brand">مصنع</small></h3>
                        <ul class="branch-info-list">
                            <li><i class="fas fa-map-marker-alt"></i> المنطقة الصناعية الأولى, شارع حلو الشام</li>
                            <li><i class="fas fa-phone"></i> <a dir="ltr" href="tel:00201122332200">0112 233 2200</a></li>
                        </ul>
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d27659.540930849183!2d30.90900974214419!3d29.93794479800713!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xe413f6136c62cd66!2sArty%20Baby%20Clothes%20Company!5e0!3m2!1sen!2seg!4v1611956813812!5m2!1sen!2seg"
                            frameborder="0" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                    </div>
                </div>
                <div class="row mb-5">
                    <div class="col-lg-4 col-12 mb-5 mb-lg-0">
                        <h3>جسر السويس</h3>
                        <ul class="branch-info-list">
                            <li><i class="fas fa-map-marker-alt"></i> 196 جسر السويس, مقابل عمارات الفاروقية</li>
                            <li><i class="fas fa-phone"></i> <a dir="ltr" href="tel:00201222688889">0122 2688 889</a></li>
                        </ul>
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d431.30388990379066!2d31.390249381744123!3d30.13908793220336!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMzDCsDA4JzIxLjQiTiAzMcKwMjMnMjUuOCJF!5e0!3m2!1sen!2seg!4v1611956286863!5m2!1sen!2seg"
                            frameborder="0" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                    </div>
                    <div class="col-lg-4 col-12 mb-5 mb-lg-0">
                        <h3>6 أكتوبر</h3>
                        <ul class="branch-info-list">
                            <li><i class="fas fa-map-marker-alt"></i> 91 المحور المركزي, بجانب صيدلية عز الدين</li>
                            <li><i class="fas fa-phone"></i> <a dir="ltr" href="tel:00201114220033">0111 4220 033</a></li>
                        </ul>
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d864.071966687198!2d30.942556129220456!3d29.97115599886931!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x145856f637f33e67%3A0xeaea8d75b5b24b17!2sAl%20Mehwar%20Al%20Markazi%20Al%20Nassr%20St%2C%20First%206th%20of%20October%2C%20Giza%20Governorate!5e0!3m2!1sen!2seg!4v1611956728975!5m2!1sen!2seg"
                            frameborder="0" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                    </div>
                    <div class="col-lg-4 col-12 mb-5 mb-lg-0">
                        <h3>القاهرة</h3>
                        <ul class="branch-info-list">
                            <li><i class="fas fa-map-marker-alt"></i> العتبة, الشوازليه, مول القدس الدور الثاني</li>
                            <li><i class="fas fa-phone"></i> <a dir="ltr" href="tel:00201144986866">0114 4986 866</a></li>
                        </ul>
                        {{-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d864.071966687198!2d30.942556129220456!3d29.97115599886931!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x145856f637f33e67%3A0xeaea8d75b5b24b17!2sAl%20Mehwar%20Al%20Markazi%20Al%20Nassr%20St%2C%20First%206th%20of%20October%2C%20Giza%20Governorate!5e0!3m2!1sen!2seg!4v1611956728975!5m2!1sen!2seg" frameborder="0" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe> --}}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <h2 class="mb-0">العلامات التجارية الشريكة</h2>
                    <p>تنتج شركة Arte Kids كم هائل من المنتجات سنوياً, و نقوم بتوزيع منتجاتنا على علامات تجارية متعددة تتبع جميعاً للشركة الأم Arte Kids</p>
                </div>
                <div class="col-lg-6 col-12 mb-5 mb-lg-0">
                    <h3>White Card</h3>
                    <img src="{{url('public')}}/img/white-card-logo.png" class="w-auto" alt="White Card Logo">
                </div>
                <div class="col-lg-6 col-12 mb-5 mb-lg-0">
                    <h3>Enigma</h3>
                    <img src="{{url('public')}}/img/enigma-logo.png" class="w-auto" alt="Enigma Logo">
                </div>
            </div>

    </section>
    <!-- Privacy Policy section end -->
    @include('layout.footer')
    @include('layout.scripts')
</body>

</html>

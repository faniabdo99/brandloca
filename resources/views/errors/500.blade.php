@include('layout.header' , [
  'PageTitle' => 'خطأ 500',
  'PageDescription' => 'خطأ 500 , نواجه في مشكلة في محاولة عرض هذه الصفحة حالياً'
])
<body>
	@include('layout.navbar')
	@include('layout.errors')
  <!-- Error Page Layout Start -->
  <section class="error-page-section text-right" id="error-404">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 col-12 d-lg-none d-block">
          <img class="error-image" src="{{url('public/img/errors/')}}/404.svg" alt="Error 404">
        </div>
        <div class="col-lg-8 col-12">
          <h1>خطأ 500</h1>
          <p class="mb-5">نواجه مشكلة في استقبال طلبك في الوقت الحالي! يرجى المحاولة مجدداً خلال عدة دقائق أو التواصل مع الدعم الفني لحل المشكلة</p>
          <h4 class="page-sub-heading">روابط سريعة</h4>
          <ul class="quick-links-list mb-5">
            <li><a href="#">الرئيسية</a></li>
            <li><a href="#">جميع المنتجات</a></li>
            <li><a href="#">عن الموقع</a></li>
            <li><a href="#">اتصل بنا</a></li>
          </ul>
          <h4 class="page-sub-heading">تواصل مع الدعم الفني للموقع</h4>
          <div class="contact-social">
                <a href="#"><i class="fa fa-youtube"></i></a>
                <a href="#"><i class="fa fa-instagram"></i></a>
                <a href="#"><i class="fa fa-facebook"></i></a>
                <a href="#"><i class="fa fa-twitter"></i></a>
          </div>
        </div>
        <div class="col-lg-4 col-12 d-lg-block d-none">
          <img class="error-image" src="{{url('public/img/errors/')}}/404.svg" alt="Error 404">
        </div>
      </div>
    </div>
  </section>
  <!-- Error Page Layout Ends -->
	@include('layout.footer')
	@include('layout.scripts')
</body>

</html>

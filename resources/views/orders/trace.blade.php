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
                        <form>
                            <input type="number" name="order_serial_number" id="order-id" placeholder="55516476">
                            <button type="submit" id="trace-order-form"><i class="fas fa-search"></i></button>
                        </form>
                    </div>
                    <div class="trace-order-result">
                        <h4 class="mb-3">معلومات الطلب</h4>
                        <table class="table table-striped border">
                            <thead>
                            <tbody>
                                <tr>
                                    <th scope="row">رقم الطلب</th>
                                    <td>225</td>
                                  </tr>
                                  <tr>
                                    <th scope="row">رقم التتبع</th>
                                    <td>5514-6624</td>
                                  </tr>
                              <tr>
                                <th scope="row">اسم العميل</th>
                                <td>عبد الرحمن فاني</td>
                              </tr>
                              <tr>
                                <th scope="row">حالة الطلب</th>
                                <td>تم الشحن</td>
                              </tr>
                              <tr>
                                <th scope="row">المحافظة</th>
                                <td>الجيزة</td>
                              </tr>
                              <tr>
                                <th scope="row">المدينة</th>
                                <td>6 أكتوبر</td>
                              </tr>
                              <tr>
                                <th scope="row">العنوان التفصيلي</th>
                                <td>الحي الحادي عشر , المجاورة الثانية , عمارة 12 شقة 22</td>
                              </tr>
                              <tr>
                                <th scope="row">عدد المنتجات</th>
                                <td>12</td>
                              </tr>
                              <tr>
                                <th scope="row">السعر الاجمالي</th>
                                <td>225 L.E</td>
                              </tr>
                              <tr>
                                <th scope="row">تكاليف الشحن</th>
                                <td>مجاناً</td>
                              </tr>
                              <tr>
                                <th scope="row">طريقة الدفع</th>
                                <td>فيزا كارت</td>
                              </tr>
                              <tr>
                                <th scope="row">تاريخ الطلب</th>
                                <td>25-6-2021</td>
                              </tr>

                            </tbody>
                          </table>
                    </div>
                </div>
            </div>
       
	</section>
    <!-- Hero section end -->
    @include('layout.footer')
    @include('layout.scripts')
</body>
</html>

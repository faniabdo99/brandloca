@include('layout.header' , ['pageTitle' => 'اتصل بنا' , 'Printable' => true])
<body>
    @include('layout.navbar')
    @include('layout.errors')
    <!-- Thanks section -->
    <section class="thanks-section">
        <div class="container">
            <div class="row">
                <div class="col-12 text-right">
                    <h2 class="page-title mb-4">تم انشاء الطلب بنجاح, شكراً لك</h2>
                    <p class="mb-5">تم تأكيد طلبك , سيتم التواصل معك قريباً لتأكيد عملية الشراء.</p>
                    @if($TheOrder->payment_method == 'vodafone-cash')
                        <h2 class="page-title mb-4">طريقة الدفع عبر فودافون كاش</h2>
                        <p class="mb-5">يمكنك دفع قيمة طلبك عبر فودافون كاش! الرقم المخصص للتحويل هو : 01055547476</p>
                    @endif
                    <h2 class="page-title mb-4">معلومات الطلب</h2>
                    <table class="table table-striped border mb-5">
                        <thead>
                            <tbody>
                                <tr>
                                    <th scope="row">رقم الطلب</th>
                                    <td>{{$TheOrder->id}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">رقم التتبع</th>
                                    <td>5514-6624</td>
                                </tr>
                                <tr>
                                    <th scope="row">اسم العميل</th>
                                    <td>{{$TheOrder->User->name}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">حالة الطلب</th>
                                    <td>{{$TheOrder->status}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">المحافظة</th>
                                    <td>{{$TheOrder->province}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">المدينة</th>
                                    <td>{{$TheOrder->city}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">العنوان التفصيلي</th>
                                    <td>{{$TheOrder->street_address}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">عدد المنتجات</th>
                                    <td>{{$TheOrder->Items->count()}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">السعر الاجمالي</th>
                                    <td>{{$TheOrder->total_amount}} L.E</td>
                                </tr>
                                <tr>
                                    <th scope="row">تكاليف الشحن</th>
                                    <td>مجاناً</td>
                                </tr>
                                <tr>
                                    <th scope="row">طريقة الدفع</th>
                                    <td>{{$TheOrder->payment_method}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">تاريخ الطلب</th>
                                    <td>{{$TheOrder->created_at->format('Y / m / d')}}</td>
                                </tr>
                            </tbody>
                    </table>
                    <h2 class="page-title mb-4">معلومات التوصيل</h2>
                    <p>سيتم شحن طلبك بناء على المعلومات التالية</p>
                    <table class="table table-striped border mb-5">
                        <thead>
                            <tbody>
                                <tr>
                                    <th scope="row">اسم العميل</th>
                                    <td>{{$TheOrder->User->name}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">المحافظة</th>
                                    <td>{{$TheOrder->shipping_province}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">المدينة</th>
                                    <td>{{$TheOrder->shipping_city}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">العنوان التفصيلي</th>
                                    <td>{{$TheOrder->shipping_street_address}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">تكاليف الشحن</th>
                                    <td>مجاناً</td>
                                </tr>
                                <tr>
                                    <th scope="row">تاريخ الوصول المتوقع</th>
                                    <td>{{$TheOrder->created_at->format('Y / m / d')}} + 3 Days</td>
                                </tr>
                            </tbody>
                    </table>

                    <a class="site-btn mb-5 hide-on-print" onclick="window.print();"><i class="fas fa-print"></i> طباعة هذه الصفحة</a>
                </div>
            </div>
        </div>
    </section>
    <!-- Thanks section end -->
    @include('layout.footer')
    @include('layout.scripts')
</body>

</html>

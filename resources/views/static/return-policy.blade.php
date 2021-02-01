@include('layout.header' , ['PageTitle' => 'سياسة الاسترجاع و الاستبدال'])
<body>
    @include('layout.navbar')
    <!-- Privacy Policy section -->
    <section class="static-content-section">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                  <h1>سياسة الاسترجاع</h1>
                    <p>يحق للمستهلك اعادة المنتجات التالفة أو التي لا تتطابق مع حالة العرض في الموقع خلال مدة أقصاها 10 أيام من تاريخ انشاء الطلب, على أن يتم ارجاع المنتج بحالة الاستلام الأصلية</p>
                    <h2>شروط الاسترجاع</h2>
                    <div>
                        <h3>يجب ان يكون المنتج بحالته الأصلية</h3>
                        <p>يجب أن يكون المنتج بحالته الأصلية أو يمكن اعادته الى الحالة الأصلية عبر اعادة التعبئة</p>
                        <h3>10 أيام من تاريخ الطلب</h3>
                        <p>يجب ألا يزيد تاريخ طلب الاسترجاع عن 10 أيام من تاريخ الطلب, يتم احتساب تاريخ الطلب من لحظة انشائه على الموقع</p>
                    </div>
                </div>
            </div>
    </section>
    <!-- Privacy Policy section end -->
    @include('layout.footer')
    @include('layout.scripts')
</body>

</html>

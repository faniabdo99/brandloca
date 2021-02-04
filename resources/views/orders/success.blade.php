@include('layout.header' , ['pageTitle' => 'شكراً لك' , 'Printable' => true])
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
                </div>
            </div>
        </div>
    </section>
    <!-- Thanks section end -->
    @include('layout.footer')
    @include('layout.scripts')
</body>

</html>

@include('layout.header' , ['pageTitle' => 'الملف الشخصي'])
<body>
    @include('layout.navbar')
    @include('layout.errors')
    <!-- Hero section -->
	<section class="profile-section">
        <div class="container">
            <div class="row">
                @include('auth.profile-sidebar')
                <div class="col-lg-8">
                    <div class="account-main-data mb-5">
                        <h4 class="mb-3">معلومات الحساب</h4>
                        <div class="row mb-5">
                            <div class="col-lg-4 col-12">
                                <p class="font-weight-bold">الاسم الأول</p>
                                <p>{{auth()->user()->first_name}}</p>
                            </div>
                            <div class="col-lg-4 col-12">
                                <p class="font-weight-bold">النسبة / الكنية</p>
                                <p>{{auth()->user()->last_name}}</p>
                            </div>
                            <div class="col-lg-4 col-12">
                                <p class="font-weight-bold">البريد الإلكتروني</p>
                                <p>{{auth()->user()->email}}</p>
                            </div>
                        </div>
                        <div class="row mb-5">
                            <div class="col-lg-4 col-12">
                                <p class="font-weight-bold">رقم الجوال</p>
                                <p>@if(auth()->user()->phone_number){{auth()->user()->phone_number}}@else <a href="{{route('profile.edit')}}"><i class="fas fa-plus"></i> اضافة رقم الجوال</a> @endif</p>
                            </div>
                            <div class="col-lg-4 col-12">
                                <p class="font-weight-bold">المحافظة</p>
                                <p>@if(auth()->user()->province){{auth()->user()->province}}@else <a href="{{route('profile.edit')}}"><i class="fas fa-plus"></i>  اضافة المحافظة</a> @endif</p>
                            </div>
                            <div class="col-lg-4 col-12">
                                <p class="font-weight-bold">المدينة</p>
                                <p>@if(auth()->user()->city){{auth()->user()->city}}@else <a href="{{route('profile.edit')}}"><i class="fas fa-plus"></i>  اختيار المدينة</a> @endif</p>
                            </div>
                        </div>
                        <p class="font-weight-bold">العنوان التفصيلي</p>
                        <p>@if(auth()->user()->street_address){{auth()->user()->street_address}}@else <a href="{{route('profile.edit')}}"><i class="fas fa-plus"></i>  اضافة العنوان التفصيلي</a> @endif</p>
                    </div>
                    <div class="account-latest-orders">
                        <h4 class="mb-3">أحدث الطلبات</h4>
                        <table class="table table-striped mb-5">
                            <thead>
                              <tr>
                                <th scope="col">رقم التتبع</th>
                                <th scope="col">القيمة الاجمالية</th>
                                <th scope="col">الحالة</th>
                                <th scope="col">اجرائات</th>
                              </tr>
                            </thead>
                            <tbody>
                              @forelse(auth()->user()->Orders() as $Order)
                              <tr>
                                <th scope="row">{{$Order->id}}</th>
                                <td>{{$Order->total_amount}} L.E</td>
                                <td>{{$Order->status}}</td>
                                <td><a href="{{route('order.complete' , $Order)}}" class="text-primary">تفاصيل الطلب</a></td>
                              </tr>
                              @empty
                                <p>لم تقم بانشاء اي طلب بعد</p>
                              @endforelse
                            </tbody>
                          </table>
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

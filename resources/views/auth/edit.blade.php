@include('layout.header' , ['pageTitle' => 'تعديل الحساب الشخصي'])
<body>
    @include('layout.navbar')
    @include('layout.errors')
    <!-- Hero section -->
	<section class="profile-section">
        <div class="container">
            <div class="row">
                @include('auth.profile-sidebar')
                <div class="col-lg-8">
                    <div class="edit-account-data mb-5">
                        <form action="{{route('profile.edit.post')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <label for="first_name">الاسم الأول</label>
                            <input type="text" name="first_name" id="first_name" value="{{old('first_name') ?? auth()->user()->first_name}}" placeholder="الاسم الأول" required >
                            <label for="last_name">الكنية / النسبة</label>
                            <input type="text" name="last_name" id="last_name" value="{{old('last_name') ?? auth()->user()->last_name}}" placeholder="الكنية / النسبة" required >
                            <label for="email">البريد الإلكتروني</label>
                            <input type="email" name="email" id="email" value="{{old('email') ?? auth()->user()->email}}" placeholder="البريد الإلكتروني" required >
                            <label for="image">الصورة الشخصية</label>
                            <input type="file" name="image" id="image">
                            <label for="phone_number">رقم الهاتف</label>
                            <input type="number" name="phone_number" value="{{old('phone_number') ?? auth()->user()->phone_number}}" id="phone_number" placeholder="رقم الهاتف">
                            <div class="row">
                                <div class="col-lg-6 col-12">
                                   <label for="province">المحافظة</label>
                                   <select name="province" id="province">
                                        <option value="">اختيار محافظة</option>
                                        <option selected value="{{auth()->user()->province}}">{{auth()->user()->province}}</option>
                                        <option value="Alexandria">الاسكندرية</option>
                                        <option value="Aswan">أسوان</option>
                                        <option value="Asyut">أسيوط</option>
                                        <option value="Beheira">البحيرة</option>
                                        <option value="Beni Suef">بني سويف</option>
                                        <option value="Cairo">القاهرة</option>
                                        <option value="Dakahlia">الدقهلية</option>
                                        <option value="Damietta">دمياط</option>
                                        <option value="Faiyum">الفيوم</option>
                                        <option value="Gharbia">الغربية</option>
                                        <option value="Giza">الجيزة</option>
                                        <option value="Ismailia">الاسماعيلية</option>
                                        <option value="Kafr El Sheikh">كفر الشيخ</option>
                                        <option value="Luxor">الأقصر</option>
                                        <option value="Matruh">مرسى مطروح</option>
                                        <option value="Minya">المنيا</option>
                                        <option value="Monufia">المنوفية</option>
                                        <option value="New Valley">الوادي الجديد</option>
                                        <option value="North Sinai">شمال سيناء</option>
                                        <option value="Port Said">بورسعيد</option>
                                        <option value="Qalyubia">القليوبية</option>
                                        <option value="Qena">قنا</option>
                                        <option value="Red Sea">البحر الأحمر</option>
                                        <option value="Sharqia">الشرقية</option>
                                        <option value="Sohag">سوهاج</option>
                                        <option value="South Sinai">جنوب سيناء</option>
                                        <option value="Suez">السويس</option>
                                    </select>
                                </div>
                                <div class="col-lg-6 col-12">
                                    <label for="city">المدينة</label>
                                    <select name="city" id="city">
                                        <option value="">اختيار مدينة</option>
                                        <option selected value="{{auth()->user()->city}}">{{auth()->user()->city}}</option>
                                         <option value="Alexandria">الاسكندرية</option>
                                         <option value="Aswan">أسوان</option>
                                         <option value="Asyut">أسيوط</option>
                                         <option value="Beheira">البحيرة</option>
                                         <option value="Beni Suef">بني سويف</option>
                                         <option value="Cairo">القاهرة</option>
                                         <option value="Dakahlia">الدقهلية</option>
                                         <option value="Damietta">دمياط</option>
                                         <option value="Faiyum">الفيوم</option>
                                         <option value="Gharbia">الغربية</option>
                                         <option value="Giza">الجيزة</option>
                                         <option value="Ismailia">الاسماعيلية</option>
                                         <option value="Kafr El Sheikh">كفر الشيخ</option>
                                         <option value="Luxor">الأقصر</option>
                                         <option value="Matruh">مرسى مطروح</option>
                                         <option value="Minya">المنيا</option>
                                         <option value="Monufia">المنوفية</option>
                                         <option value="New Valley">الوادي الجديد</option>
                                         <option value="North Sinai">شمال سيناء</option>
                                         <option value="Port Said">بورسعيد</option>
                                         <option value="Qalyubia">القليوبية</option>
                                         <option value="Qena">قنا</option>
                                         <option value="Red Sea">البحر الأحمر</option>
                                         <option value="Sharqia">الشرقية</option>
                                         <option value="Sohag">سوهاج</option>
                                         <option value="South Sinai">جنوب سيناء</option>
                                         <option value="Suez">السويس</option>
                                     </select>
                                 </div>
                            </div>
                            <label for="street_address">العنوان الكامل</label>
                            <input type="text" name="street_address" value="{{old('street_address') ?? auth()->user()->street_address}}" id="street_address" placeholder="العنوان الكامل">
                            <label for="zip_code">الرمز البريدي</label>
                            <input type="number" name="zip_code" value="{{old('zip_code') ?? auth()->user()->zip_code}}"  id="zip_code" placeholder="الرمز البريدي">
                            <button class="site-btn" type="submit">تحديث البيانات</button>
                        </form>
                    </div>
                    <div class="edit-account-data mb-5">
                        <h4 class="mb-4">تحديث كلمة المرور</h4>
                        <form action="{{route('profile.password.edit.post')}}" method="post">
                            @csrf
                            <label for="current_pass">كلمة المرور الحالية</label>
                            <input type="password" name="current_pass" id="current_pass" placeholder="كلمة المرور الحالية">
                            <label for="password">كلمة المرور الجديدة</label>
                            <input type="password" name="password" id="password" placeholder="كلمة المرور الجديدة">
                            <label for="password_confirmation">تأكيد كلمة المرور الجديدة</label>
                            <input type="password" name="password_confirmation" id="password_confirmation" placeholder="تأكيد كلمة المرور الجديدة">
                            <button class="site-btn" type="submit">تحديث كلمة المرور</button>
                        </form>
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

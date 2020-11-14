<div class="col-lg-4 profile-sidebar">
    <div class="user-info mb-5">
        <img src="{{auth()->user()->profileImage}}" alt="{{auth()->user()->name}}" title="{{auth()->user()->name}}" />
        <h2>{{auth()->user()->name}}</h2>
        <p>{{auth()->user()->email}}</p>
        @if(auth()->user()->confirmed != 1)
        <p class="text-danger">لم يتم تأكيد بريدك الالكتروني بعد , يرجى متابعة الخطوات في الرسالة التي تم ارسالها اليك عند تسجيل الحساب</p>
            <a class="site-btn" id="resend-account-confirmation-mail" href="javascript:;" data-id="{{auth()->user()->id}}" data-action="{{route('auth.resendConfirmation')}}"><i class="fas fa-envelope ml-3"></i> اعادة ارسال رمز التأكيد</a>
        @endif
    </div>
    <div class="user-profile-actions-list">
        <ul>
            <li @if(\Route::current()->action['as'] == 'profile') class="active" @endif><a class="d-block stretched-link" href="{{route('profile')}}"><i class="fas fa-user ml-3"></i> الملف الشخصي</a></li>
            <li @if(\Route::current()->action['as'] == 'profile.edit') class="active" @endif><a class="d-block stretched-link" href="{{route('profile.edit')}}"><i class="fas fa-edit ml-3"></i> تحديث الملف الشخصي</a></li>
            <li @if(\Route::current()->action['as'] == 'profile.kids') class="active" @endif><a class="d-block stretched-link" href="{{route('profile.kids')}}"><i class="fas fa-users ml-3"></i> أطفالي</a></li>
            <li @if(\Route::current()->action['as'] == 'wishlist') class="active" @endif><a class="d-block stretched-link" href="{{route('wishlist')}}"><i class="fas fa-heart ml-3"></i> المفضلة</a></li>
            <li @if(\Route::current()->action['as'] == 'profile.report') class="active" @endif><a class="d-block stretched-link" href="{{route('profile.report')}}"><i class="fas fa-bug ml-3"></i> ابلاغ عن مشكلة</a></li>
            <li><a class="d-block stretched-link" href="{{route('logout')}}"><i class="fas fa-sign-out-alt ml-3"></i> تسجيل الخروج</a></li>
        </ul>
    </div>
</div>

@if(session()->has('success'))
<div class="notification success-notification">
    <div class="notification-icon">
        <i class="fas fa-check"></i>
    </div>
    <div class="notification-content">
        <b>تم بنجاح !</b>
        <p>{{session('success')}}</p>
    </div>
</div>
@endif
@if ($errors->any())
<div class="notification error-notification">
    <div class="notification-icon">
        <i class="fas fa-times"></i>
    </div>
    <div class="notification-content">
        <b>خطأ</b>
        @foreach ($errors->all() as $error)
        <p>{{$error}}</p>
        @endforeach
    </div>
</div>
@endif
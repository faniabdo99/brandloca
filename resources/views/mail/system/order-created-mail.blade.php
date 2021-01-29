@component('mail::message')
# شكراً لشرائك من Arte Online , {{$TheOrder->name}}
لقد تم انشاء طلبك بنجاح
<br>
رقم التتبع الخاص بك هو : <b>{{$TheOrder->tracking_number}}</b>
<br>
@if($TheOrder->payment_method == 'vodafone-cash')
لقد اخترت الدفع باستخدام فودافون كاش, لاتمام عملية الشراء يرجى ارسال مبلغ {{$TheOrder->total_amount}} جنيه مصري الى الرقم 01151411867
@elseif($TheOrder->payment_method == 'pod')
لقد اخترت الدفع عند استلام المنتج, سيتواصل معك مندوبنا قريباً لتسليم المنتجات
@elseif($TheOrder->payment_method == 'credit-card')
لقد اخترت الدفع عبر بطاقة الائتمان, سيصلك رسالة تأكيد الدفع على بريدك الإلكتروني قريباً
@endif

@component('mail::button', ['url' => route('order.trace')])
تتبع الطلب
@endcomponent

شكراً لك,<br>
{{ config('app.name') }}
@endcomponent

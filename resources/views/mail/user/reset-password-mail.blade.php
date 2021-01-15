@component('mail::message')
# اعادة تعيين كلمة المرور
مرحباً {{$EmailData->name}}, لقد قمت بطلب اعادة تعيين كلمة المرور<br>
يرجى الضغط على الرابط التالي لاتمام عملية اعادة التعيين

@component('mail::button', ['url' => route('reset.choosePassword.get' , [$EmailData->email, md5($EmailData->code)])])
اعادة تعيين كلمة المرور
@endcomponent

شكراً لك,<br>
{{ config('app.name') }}
@endcomponent

@component('mail::message')
# مرحباً , {{$TheUser->first_name}}
لقد قمت بتغيير بريدك الالكتروني المرتبط بحسابك في Arte Online, نحتاج مساعدتك في خطوة اخيرة و هي تأكيد البريد الالكتروني , يرجى الضغط على الرابط التالي للتأكيد
@component('mail::button', ['url' => route('profile.approve' , $TheUser->code)])
تأكيد الحساب
@endcomponent
ان كنت لا تعلم بأمر هذا التغيير فمن المرجح انه تم اختراق حسابك , تواصل معنا فوراً لحل المشكلة
شكراً لك,<br>
{{ config('app.name') }}
@endcomponent

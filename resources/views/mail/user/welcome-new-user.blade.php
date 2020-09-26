@component('mail::message')
# مرحباً بك في Arte Online , {{$TheUser->first_name}}
يسعدنا انضمامك الينا , تبقى لديك خطوة واحدة و هي نأكيد بريدك الالكتروني , نحتاج منك القيام بهذه الخطوة للحفاظ على بيئة تسوق آمنة في Arte Online
@component('mail::button', ['url' => route('profile.approve' , $TheUser->code)])
تأكيد الحساب
@endcomponent

شكراً لك,<br>
{{ config('app.name') }}
@endcomponent

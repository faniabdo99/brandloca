@component('mail::message')
# رسالة جديدة من Arte Online
وصلت رسالة جديدة من موقع Arte Online, Contact Us Form
<p>{{$EmailData['name']}}</p>
<p>{{$EmailData['email']}}</p>
<p style="font-weight:bold;">{{$EmailData['subject']}}</p>
<p>{{$EmailData['message']}}</p>
@endcomponent

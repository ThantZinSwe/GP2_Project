@component('mail::message')
<h1>Hello {{$enroll->user->name}}</h1>
<h2>Your enroll {{$enroll->course->name}} course is confirmed. You can watch now!</h2>
<p>Thanks,</p><br>
<h3>{{config('app.name')}}</h3>
@endcomponent

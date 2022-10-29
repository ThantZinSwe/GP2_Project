@component('mail::message')
<h1>Dear {{$user->name}},</h1> 
<h2>Forget Password Email</h2>  
<p>You can reset password from bellow link:</p>
@component('mail::button', ['url' => "http://127.0.0.1:8000/change-password/$token"])
Change Password
@endcomponent

Thanks,<br>
CoderCamp
@endcomponent

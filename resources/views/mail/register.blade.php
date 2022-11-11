@component('mail::message')
# Introduction

Register Sucessfully

<h1>{{$user->name}}</h1>
<p>You can use this <b style="font-size: 18px;">{{ $user_coupon->coupon->code}}</b> Coupon before {{ Carbon\Carbon::parse($user_coupon->expired_time)->format('Y-m-d') }}</p>
@component('mail::button', ['url' => "http://127.0.0.1:8000/"])
Welcome to home page
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent

@component('mail::message')
# Introduction

Register Sucessfully
<h1>{{$user->name}}</h1>
@component('mail::button', ['url' => "http://127.0.0.1:8000/"])
Welcome to home page
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent

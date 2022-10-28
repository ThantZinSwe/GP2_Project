@component('mail::message')
# Introduction

Register Sucessfully
<h1>{{$user->name}}</h1>
@component('mail::button', ['url' => ''])
Welcome to home page
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent

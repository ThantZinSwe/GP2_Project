<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <link rel="stylesheet" href="/library/reset.css">
    <link rel="stylesheet" href="/auth/style.css">
    <link rel="stylesheet" href="/library/fontawesome/css/all.min.css">
</head>
<body>
<div class="sign-box">
    <h1 class="sign-title">Reset Password</h1>
    @if(Session::has('message'))
      <small class="success text-center">{{ Session::get('message') }}</small>
    @endif
    @if(Session::has('error'))
    <small class="error text-center">{{ Session::get('message') }}</small>
    @endif
    <form action="{{ route('reset.send') }}" class="sign-form" method="post">
      @csrf
      <div class="conmon-req pro-email">
      <i class="fa-solid fa-envelope"></i>
        <input type="email" placeholder="Email" required name="email">
      </div>
      @error('email')
      <small class="error">{{ $message }}</small><br>
      @enderror
      <input type="submit" value="Send Password Reset Link" class="pro-submit">
    </form>
  </div>
</body>
</html>
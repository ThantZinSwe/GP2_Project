<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="/library/reset.css">
    <link rel="stylesheet" href="/auth/style.css">
    <link rel="stylesheet" href="/library/fontawesome/css/all.min.css">
</head>
<body>
<div class="sign-box">
    <h1 class="sign-title">Login</h1>
    @if(Session::has('message'))
      <small class="error text-center">{{ Session::get('message') }}</small>
    @endif
    <form action="{{ route('login.post') }}" class="sign-form" method="post">
      @csrf
      <div class="conmon-req pro-email">
      <i class="fa-solid fa-envelope"></i>
        <input type="email" placeholder="Email" required name="email">
      </div>
      @error('email')
      <small class="error">{{ $message }}</small><br>
      @enderror
      <div class="conmon-req pro-pass">
      <i class="fa-solid fa-lock"></i>
        <input type="password" placeholder="Password" required name="password">
      </div>
      @error('password')
      <small class="error">{{ $message }}</small><br>
      @enderror
      <a href="#">Forgot Password?</a><br>
      <input type="submit" value="Login" class="pro-submit">
      <a href="{{ route('auth.register') }}" class="pro-submit signup">Sign Up</a>
    </form>
  </div>
</body>
</html>
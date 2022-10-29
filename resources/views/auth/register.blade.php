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
    <h1 class="sign-title">SIGN UP</h1>
    
    <form method="post" action="{{route('auth.register.save')}}" class="sign-form">
    {{ csrf_field() }}
    <input type="hidden" placeholder="UserName" required name="name">
      <div class="conmon-req pro-name">
      <i class="fa-solid fa-user"></i>
        <input type="text" placeholder="UserName" name="name">
        @error('name')
        <span class="text-danger">{{$message}}</span>
        @enderror
      </div>
      
      <div class="conmon-req pro-email">
      <i class="fa-solid fa-envelope"></i>
        <input type="email" placeholder="Email" name="email">
        @error('email')
        <span class="text-danger">{{$message}}</span>
        @enderror
      </div>
      

      <div class="conmon-req pro-pass">
      <i class="fa-solid fa-lock"></i>
        <input type="password" placeholder="Password" name="password">
        @error('password')
        <span class="text-danger">{{$message}}</span>
        @enderror
      </div>
     
      <div class="conmon-req pro-phone">
      <i class="fa-solid fa-phone"></i>
        <input type="text" placeholder="Phone" name="phone">
        @error('phone')
        <span class="text-danger">{{$message}}</span>
        @enderror
      </div>
      
      <a href="{{ route('login.get') }}">Have An Account?</a><br>
      <input type="submit" value="Sign Up" class="pro-submit">
    </form>
  </div>
</body>
</html>
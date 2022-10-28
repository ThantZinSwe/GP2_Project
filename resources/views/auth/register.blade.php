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
    @if (count($errors) > 0)
    <!-- Form Error List -->
    <div class="alert alert-danger">
        <strong>Whoops! Something went wrong!</strong>
 
        <br><br>
 
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
  @endif
    <form method="post" action="{{route('auth.register.save')}}" class="sign-form">
    {{ csrf_field() }}
    <input type="hidden" placeholder="UserName" required name="name">
      <div class="conmon-req pro-name">
      <i class="fa-solid fa-user"></i>
        <input type="text" placeholder="UserName" required name="name">
        
      </div>
      <div class="conmon-req pro-email">
      <i class="fa-solid fa-envelope"></i>
        <input type="email" placeholder="Email" required name="email">
        
      </div>
      <div class="conmon-req pro-pass">
      <i class="fa-solid fa-lock"></i>
        <input type="password" placeholder="Password" required name="password">
        
      </div>
      <div class="conmon-req pro-phone">
      <i class="fa-solid fa-phone"></i>
        <input type="text" placeholder="Phone" required name="phone">
        
      </div>
      <a href="{{ route('login.get') }}">Have An Account?</a><br>
      <input type="submit" value="Sign Up" class="pro-submit">
    </form>
  </div>
</body>
</html>
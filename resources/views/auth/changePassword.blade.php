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
            <form action="{{ route('change.password.post') }}" class="sign-form" method="post">
                @csrf
                <input type="hidden" name="token" value="{{ $token }}">
                <div class="conmon-req pro-email">
                    <i class="fa-solid fa-envelope"></i>
                    <input type="email" placeholder="Email" required name="email">
                </div>
                @error('email')
                    <small class="error">{{ $message }}</small><br>
                @enderror
                <div class="conmon-req pro-pass">
                    <i class="fa-solid fa-lock"></i>
                    <input type="password" placeholder="New Password" required name="new_password">
                </div>
                @error('new_password')
                    <small class="error">{{ $message }}</small><br>
                @enderror
                <div class="conmon-req pro-pass">
                    <i class="fa-solid fa-lock"></i>
                    <input type="password" placeholder="Comfirm Password" required name="comfirm_password">
                </div>
                @error('comfirm_password')
                    <small class="error">{{ $message }}</small><br>
                @enderror
                <input type="submit" value="Reset Password" class="pro-submit">
            </form>
          </div>
        </body>
        </html>
    </div>
</body>
</html>
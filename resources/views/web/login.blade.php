<!DOCTYPE html>
<html>

<head>
    <title>Slide Navbar</title>
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/css/css_login_signup.css')}}">
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">
    <style>
    .flash-message {
        position: fixed;
        top: 20px;
        right: 20px;
        z-index: 9999;
        display: none;
    }
    </style>
</head>

<body>
    <div class="main">
        <input type="checkbox" id="chk" aria-hidden="true">

        <div class="signup">
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <label for="chk" aria-hidden="true">Sign up</label>
                <input type="text" name="name" placeholder="User name" required>
                <input type="email" name="email" placeholder="Email" required>
                <input type="password" name="password" placeholder="Password" required>
                <input type="password" name="password_confirmation" placeholder="Confirm Password" required>
                <button type="submit">Sign up</button>
                @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif

            </form>
        </div>

        <!-- <div class="login">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <label for="chk" aria-hidden="true">Login</label>
                <input type="email" name="email" placeholder="Email" required="">
                @if ($errors->has('email'))
                <div class="alert alert-danger">{{ $errors->first('email') }}</div>
                @endif
                <input type="password" name="password" placeholder="Password" required="">
                @if ($errors->has('password'))
                <div class="alert alert-danger">{{ $errors->first('password') }}</div>
                @endif
                @if ($errors->has('email') && !$errors->has('password'))
                <div class="alert alert-danger">{{ $errors->first('email') }}</div>
                @endif
                <button>Login</button>
                <center><a href="{{ url('/home')}}" style="color: black; text-decoration: none;">Back to Shop</a>
                </center>
                <br>
                <center>
                    <a href="{{ route('password.request') }}" style="color: black; text-decoration: none;">Forgot
                        Password?</a>
                </center>
                
            </form>
        </div> -->
        <div class="login">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <label for="chk" aria-hidden="true">Login</label>

                <!-- Success Message -->


                <!-- General Error Messages -->


                <!-- Email Field -->
                <input type="email" name="email" placeholder="Email" required="" value="{{ old('email') }}">
                @if ($errors->has('email'))
                <div class="alert alert-error">{{ $errors->first('email') }}</div>
                @endif

                <!-- Password Field -->
                <input type="password" name="password" placeholder="Password" required="">
                @if ($errors->has('password'))
                <div class="alert alert-error">{{ $errors->first('password') }}</div>
                @endif

                <button>Login</button>

                <center><a href="{{ url('/home') }}" style="color: black; text-decoration: none;">Back to Shop</a>
                </center>
                <br>
                <center>
                    <a href="{{ route('password.request') }}" style="color: black; text-decoration: none;">Forgot
                        Password?</a>
                </center>
                <center>
                    <a href="{{ route('password.reset.withotp') }}" style="color: black; text-decoration: none;">Reset
                        password with OTP</a>
                </center>
            </form>
        </div>

</body>

</html>
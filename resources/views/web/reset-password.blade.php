<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/css/css_login_signup.css')}}">
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">
    <style>
    body {
        background: linear-gradient(to bottom, #0f0c29, #302b63, #24243e);
    }

    .main label {
        font-size: 16px;
        /* Điều chỉnh kích thước phông chữ của nhãn */
    }

    .main input[type="email"],
    .main input[type="password"] {
        font-size: 14px;
        /* Điều chỉnh kích thước phông chữ của ô nhập liệu */
    }

    .main button {
        font-size: 16px;
        /* Điều chỉnh kích thước phông chữ của nút */
    }

    .main div {
        margin-bottom: 15px;
        /* Thêm khoảng cách dưới cho mỗi div chứa input và label */
    }

    .main label {
        display: block;
        /* Đặt hiển thị của nhãn là block để các label không nằm cùng một hàng với input */
        margin-bottom: 5px;
        /* Thêm khoảng cách dưới cho mỗi nhãn */
    }

    .main input[type="email"],
    .main input[type="password"] {
        padding: 8px;
        /* Đặt padding cho input để tạo khoảng cách giữa input và viền ngoài */
    }
    </style>
</head>

<body>
    <div class="main">
        <form method="POST" action="{{ route('password.update') }}">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">

            <div>
                <label for="email">Email Address</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus>
            </div>

            <div>
                <label for="password">Password</label>
                <input id="password" type="password" name="password" required autocomplete="new-password">
            </div>

            <div>
                <label for="password_confirmation">Confirm Password</label>
                <input id="password_confirmation" type="password" name="password_confirmation" required>
            </div>

            <div>
                <button type="submit">Reset Password</button>
            </div>

        </form>
        @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif
    </div>
</body>

</html>
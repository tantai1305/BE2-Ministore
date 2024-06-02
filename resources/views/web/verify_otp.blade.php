<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
    body {
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        font-family: 'Jost', sans-serif;
        background: linear-gradient(to bottom, #0f0c29, #302b63, #24243e);
    }

    .main {
        width: 350px;
        height: 500px;
        margin: 0 auto;
        position: relative;
        /* Thêm thuộc tính position: relative; */
        background: url("https://doc-08-2c-docs.googleusercontent.com/docs/securesc/68c90smiglihng9534mvqmq1946dmis5/fo0picsp1nhiucmc0l25s29respgpr4j/1631524275000/03522360960922298374/03522360960922298374/1Sx0jhdpEpnNIydS4rnN4kHSJtU1EyWka?e=view&authuser=0&nonce=gcrocepgbb17m&user=03522360960922298374&hash=tfhgbs86ka6divo3llbvp93mg4csvb38") no-repeat center/ cover;
        border-radius: 10px;
        overflow: hidden;
        z-index: 1;
        box-shadow: 5px 20px 50px #000;
        /* Đảm bảo .main ở trên layer để hiển thị box-shadow */
    }

    /* Đảm bảo nội dung bên trong `.main` được căn giữa */
    .main form {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }

    /* Định dạng input và label */
    .main label {
        display: block;
        margin-bottom: 10px;
        color: white;
    }

    .main input {
        width: 100%;
        padding: 10px;
        margin-bottom: 15px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    /* Định dạng button */
    .main button {
        justify-content: center;
        display: block;
        color: #fff;
        background: #573b8a;
        font-size: 1em;
        font-weight: bold;
        margin-top: 20px;
        outline: none;
        border: none;
        border-radius: 5px;
        transition: .2s ease-in;
        cursor: pointer;
    }

    .main button:hover {
        background-color: #0056b3;
    }
    </style>
</head>

<body>
    <div class="main">
        <form method="POST" action="{{ route('password.reset.withotp.verifyOtp') }}">
            @csrf
            <div class="form-group">
                <label for="email">Email:</label>
                <input name="email" value="{{ $email }}">
            </div>
            <!-- <input type="hidden" name="email" value="{{ $email }}"> -->
            <div class="form-group">
                <label for="otp">OTP</label>
                <input type="text" class="form-control" id="otp" name="otp" required>
            </div>
            <div class="form-group">
                <label for="password">New Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div class="form-group">
                <label for="password_confirmation">Confirm Password</label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation"
                    required>
            </div>
            <button type="submit" class="btn btn-primary">Verify OTP and Reset Password</button>
        </form>
    </div>
</body>

</html>
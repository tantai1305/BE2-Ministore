<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xác nhận đơn hàng</title>
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .card {
            border: none;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 15px;
        }

        .card-title {
            font-size: 2rem;
            color: #343a40;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }

        .customer-name {
            font-size: 1.2rem;
            color: #6c757d;
        }
        .order-id {
            font-size: 1.2rem;
            color: #6c757d;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <div class="card p-5">
            <div class="card-body">
                <h5 class="card-title text-center mb-4">Xác nhận đơn hàng <span><b>#11-Thành Công</b></span></h5>
                <p class="text-center order-id">ID Đơn hàng: <span>11</span></p>
                <p class="text-center mb-4">Đơn hàng của bạn đã được xác nhận thành công !</p>
                <p class="text-center mb-4">Chúng tôi sẽ <b>Giao Hàng</b> trong thời gian tối đa 3 ngày làm việc !</p>
                <div class="text-center mt-4">
                    <a href="{{ url('/home') }}" class="btn btn-primary">Quay lại cửa hàng</a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="">
<!--  tạo ra một token CSRF và nhúng nó vào trang để sử dụng trong các yêu cầu AJAX
 hoặc các biểu mẫu gửi đi. -->
 <meta name="csrf-token" content="{{ csrf_token() }}">
<!-- cdn ajax -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<title>Mini Store Admin</title>

<!-- Custom fonts for this template-->
<link href="{{ asset('backend/asset/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
<link
    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">

<!-- Custom styles for this template-->
<link href="{{ asset('backend/asset/css/sb-admin-2.min.css') }}" rel="stylesheet">
<link href="{{ asset('backend/asset/css/admin-css.css') }}" rel="stylesheet">
<link href="{{ asset('backend/asset/css/sb-admin-2.css') }}" rel="stylesheet">

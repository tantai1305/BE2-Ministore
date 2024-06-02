<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OpenStreetMap with Leaflet</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/style.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Jost:wght@300;400;500&family=Lato:wght@300;400;700&display=swap"
        rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css" rel="stylesheet">
    <!-- script
    ================================================== -->
    <script src="{{asset('frontend/js/modernizr.js')}}"></script>
    <style>
    .containerc {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        padding: 20px;
        margin: auto;
        /* Căn giữa container */
        max-width: 1000px;
        /* Giới hạn chiều rộng container */
    }

    .section-highlights {
        display: flex;
        justify-content: center;
        align-items: center;
        /* Căn giữa các phần tử bên trong section */
        text-align: center;
        /* Căn giữa nội dung trong section */
        margin-bottom: 50px;
        /* Margin dưới để tạo khoảng cách với phần nội dung tiếp theo */
    }

    .contact-form {
        flex: 1;
        min-width: 300px;
        max-width: 45%;
        background: #f4f4f4;
        padding: 20px;
        border-radius: 8px;
        margin-right: 10px;
        position: relative;
        z-index: 2;
    }

    .contact-form h2 {
        margin-bottom: 20px;
    }

    .contact-form label {
        display: block;
        margin-bottom: 8px;
    }

    .contact-form input,
    .contact-form textarea {
        width: 100%;
        padding: 10px;
        margin-bottom: 20px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    .contact-form button {
        padding: 10px 20px;
        border: none;
        background: #333;
        color: #fff;
        border-radius: 4px;
        cursor: pointer;
    }

    #map {
        flex: 1;
        min-width: 300px;
        height: 600px;
        border-radius: 8px;
        position: relative;
        z-index: 1;
    }

    nav {
        position: fixed;
        top: 0;
        width: 100%;
        z-index: 10;
    }

    .contact-info .icon {
        display: inline-block;
        width: 24px;
        height: 24px;
        margin-right: 10px;
        vertical-align: middle;
    }


    .contact-info {
        font-family: Arial, sans-serif;
        margin: 20px 0;
        vertical-align: middle;

    }

    .contact-info a {
        display: flex;
        align-items: center;
        text-decoration: none;
        color: #000;
        margin-bottom: 10px;
    }

    .contact-info a img.icon {
        margin-right: 10px;
        width: 24px;
        height: 24px;
    }
    </style>
</head>

<body data-bs-spy="scroll" data-bs-target="#navbar" data-bs-root-margin="0px" data-bs-smooth-scroll="true" tabindex="0">
    @extends('web.nav')
    @section('navbar')
    <nav>
        <!-- Nội dung thanh điều hướng -->
    </nav>
    <section class="container section section-highlights" data-anim-scroll-group="Highlights"
        style="padding-top: 70px;">
        <div class="containerc responsive-content">
            <div class="contact-form responsive-content-viewport-content">
                <h2>Contact Us</h2>
                <div class="contact-info" style="text-align:center;">
                    <a href="https://www.facebook.com/yourprofile" target="_blank">
                        <img src="https://cdn-icons-png.flaticon.com/512/174/174848.png" alt="Facebook" class="icon">
                        Follow us on Facebook
                    </a>
                    <br>
                    <a href="tel:+1234567890" target="_blank">
                        <img src="https://cdn-icons-png.flaticon.com/512/724/724664.png" alt="Phone" class="icon">
                        +123 456 7890
                    </a>
                    <br>
                    <a href="mailto:ministorelaravel@gmail.com" target="_blank">
                        <img src="https://cdn-icons-png.flaticon.com/512/561/561127.png" alt="Email" class="icon">
                        ministorelaravel@gmail.com
                    </a>
                </div>
            </div>
            <div id="map"></div>
            <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
            <script>
            // Đặt tọa độ trung tâm tại đường Đỗ Xuân Hợp, TP Hồ Chí Minh
            var map = L.map('map').setView([10.8268, 106.7567], 13);
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a>'
            }).addTo(map);
            // Thêm điểm đánh dấu tại đường Đỗ Xuân Hợp
            L.marker([10.8268, 106.7567]).addTo(map)
                .bindPopup('Đường Đỗ Xuân Hợp')
                .openPopup();
            </script>
        </div>
    </section>
    @endsection
</body>

</html>
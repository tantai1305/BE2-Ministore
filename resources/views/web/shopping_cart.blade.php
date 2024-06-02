<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping cart</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/carts.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="card">
        <form action="/cart/send" method="POST">
            <div class="row">
                <div class="col-md-8 cart" style="max-height: 700px; overflow: scroll;">
                    <div class="title">
                        <div class="row">
                            <div class="col">
                                <h4><b>Giỏ Hàng</b></h4>
                            </div>
                        </div>
                    </div>
                    @if (count($products) > 0)
                        <!-- Nội dung hiển thị sản phẩm trong giỏ hàng -->
                        @php
                            $total = 0;
                        @endphp
                        @foreach ($products as $product)
                            @php
                                $price = $product->giaGiam * Session::get('cart')[$product->maSP];
                                $total += $price;
                            @endphp
                            <div class="row border-top border-bottom">
                                <div class="row main align-items-center">
                                    <div class="col-2"><img class="img-fluid" src="{{ asset($product->anhDaiDien) }}">
                                    </div>
                                    <div class="col-3">
                                        <div class="row text-muted">{{ $product->danhmucs->tenDanhMuc }}</div>
                                        <div class="row"><b>{{ $product->tenSP }}</b></div>
                                    </div>
                                    <div class="col-3">
                                        <div class="row text-muted"><strike>{{ number_format($product->giaBan) }}
                                                VND</strike></div>
                                        <div class="row"><b>{{ number_format($product->giaGiam) }}<sup>VND</sup></b>
                                        </div>
                                    </div>
                                    <div class="col product-qty">
                                        <input class='form-control text-center me-3'
                                            name="product_id[{{ $product->maSP }}]" style='max-width: 4rem'
                                            type="number" value="{{ Session::get('cart')[$product->maSP] }}"
                                            min="1">
                                    </div>
                                    <div class="col"><b>{{ number_format($price) }} VND</b> <a
                                            href="/cart/delete/{{ $product->maSP }}"><span
                                                class="close">&#10005;</span></a> </div>
                                </div>
                            </div>
                        @endforeach
                        <!-- Hiển thị tổng tiền và nút cập nhật giỏ hàng -->
                        <div class="row mt-3">
                            <div class="col-2"></div>
                            <div class="col-10">
                                <div class="row">
                                    <div class="col-5">
                                        <h3 class="text-end"><b>Tổng Tiền:</b></h3>
                                    </div>
                                    <div class="col-7">
                                        <h3 class="text-start">{{ number_format($total) }}<sup>VND</sup></h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button formaction="/cart/update" class="btn btn-dark">Cập Nhật Giỏ Hàng</button>
                        <div class="back-to-shop"><a href="{{ url('/home') }}">&leftarrow;<span
                                    class="text-muted">Back to shop</span></a></div>
                    @else
                        <!-- Nếu giỏ hàng rỗng, không có sản phẩm nào được hiển thị -->
                        <div class="row">
                            <div class="col text-center">
                                <h5>Giỏ hàng của bạn đang trống.</h5>
                                <a href="{{ url('/home') }}" class="btn btn-primary">Mua sắm ngay</a>
                            </div>
                        </div>
                    @endif
                </div>
                <div class="col-md-4 summary">
                    <div>
                        <h5><b>Thông Tin Giao Hàng</b></h5>
                    </div>
                    <hr>
                    <!-- Form nhập thông tin giao hàng -->
                    <input type="text" placeholder="Tên" name="tenKhachHang" class="form-control mb-2" value="{{old('tenKhachHang')}}">
                    <input type="tel" placeholder="Số Điện Thoại" name="sdt" class="form-control mb-2" value="{{old('sdt')}}">
                    <input type="email" placeholder="Email" name="email" class="form-control mb-2" value="{{old('email')}}">
                    <input type="text" placeholder="Địa chỉ" name="diaChi" class="form-control mb-2" value="{{old('diaChi')}}">
                    <input type="text" placeholder="Ghi Chú" name="ghiChu" class="form-control mb-2" value="{{old('ghiChu')}}">
                    <button type="submit" class="btn">Gửi Đơn Hàng</button>
                </div>
            </div>
            @csrf
        </form>
    </div>
</body>

</html>

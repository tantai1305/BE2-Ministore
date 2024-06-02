<div style="text-align: center">
    <h2>Hi! {{ $nameInfo }}</h2>
    <p>Bạn đã đặt hàng tại hệ thống của chúng tôi, vui lòng kiểm tra lại thông tin đơn hàng của bạn và nhấn vào nút xác
        nhận đơn hàng bên dưới!</p>

    <h3>Thông tin khách hàng</h3>
    <p>Tên: {{ $nameInfo }}</p>
    <p>SĐT: {{ $sdtInfo }}</p>
    <p>Địa chỉ: {{ $diachiInfo }}</p>

    <h3>Thông tin đơn hàng</h3>
    <table style="width: 100%; border-collapse: collapse;">
        <thead>
            <tr>
                <th style="border: 1px solid #dddddd; padding: 8px;">Tên sản phẩm</th>
                <th style="border: 1px solid #dddddd; padding: 8px;">Số lượng</th>
                <th style="border: 1px solid #dddddd; padding: 8px;">Giá</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orderDetails as $productId => $quantity)
                @php
                    $product = App\Models\SanPham::find($productId);
                @endphp
                <tr>
                    <td style="border: 1px solid #dddddd; padding: 8px;">{{ $product->tenSP }}</td>
                    <td style="border: 1px solid #dddddd; padding: 8px;">{{ $quantity }}</td>
                    <td style="border: 1px solid #dddddd; padding: 8px;">{{ number_format($product->giaGiam) }} VND</td>
                </tr>
            @endforeach

        </tbody>
    </table>
    <p style="margin-top: 30px">
        <a href="{{ route('order.confirm', ['token' => $token]) }}"
            style="background-color: #4CAF50; color: white; padding: 10px 20px; text-align: center; text-decoration: none; display: inline-block;">Xác
            Nhận Đơn Hàng</a>
    </p>
</div>

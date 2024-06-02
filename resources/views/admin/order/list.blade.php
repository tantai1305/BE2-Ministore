@extends('admin.app')
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Danh Sách Đơn Hàng</h1>
        </div>
        <!-- table order -->
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead class="bg-primary">
                            <tr>
                                <th>ID</th>
                                <th>Tên</th>
                                <th>SDT</th>
                                <th>Email</th>
                                <th>Địa Chỉ</th>
                                <th>Ghi Chú</th>
                                <th>Chi Tiết</th>
                                <th>Ngày</th>
                                <th>Trạng Thái</th>
                                <th>Tùy Chỉnh</th>
                            </tr>
                        </thead>
                        <tfoot class="bg-primary">
                            <tr>
                                <th>ID</th>
                                <th>Tên</th>
                                <th>SDT</th>
                                <th>Email</th>
                                <th>Địa Chỉ</th>
                                <th>Ghi Chú</th>
                                <th>Chi Tiết</th>
                                <th>Ngày</th>
                                <th>Trạng Thái</th>
                                <th>Tùy Chỉnh</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($orders as $order)
                                <tr>
                                    <td>{{ $order->maDonHang }}</td>
                                    <td>{{ $order->tenKhachHang }}</td>
                                    <td>{{ $order->sdt }}</td>
                                    <td>{{ $order->email }}</td>
                                    <td>{{ $order->diaChi }}</td>
                                    <td>{{ $order->ghiChu }}</td>
                                    <!-- xem chi tiết hóa đơn -->
                                    <td><a class="action-link edit-link"
                                            href="/admin/order/detail/{{ $order->orderDetails }}">Xem</a></td>
                                    <td>{{ $order->created_at }}</td>
                                    <td>
                                        @if ($order->trangThai == 1)
                                        <a class="action-link confirm-link" href="">Đã Xác Nhận</a>
                                        @else
                                            <a class="action-link noconfirm-link" href="">Chưa Xác Nhận</a>
                                        @endif
                                    </td>
                                    <td>
                                        <a onclick="removeRowOrder('{{ $order->maDonHang }}', '/admin/order/delete')"
                                            class="action-link del-link" href="#">Xóa</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

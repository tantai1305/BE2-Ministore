@extends('admin.app')
@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Danh Sách Sản Phẩm</h1>
    </div>
    <!-- Table product -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead class="bg-primary">
                        <tr>
                            <th>ID</th>
                            <th>Ảnh</th>
                            <th>Tên Sản Phẩm</th>
                            <th>Giá Bán</th>
                            <th>Giá Giảm</th>
                            <th>Màu</th>
                            <th>Active</th>
                            <th>Trạng Thái</th>
                            <th>Tùy Chỉnh</th>
                        </tr>
                    </thead>
                    <tfoot class="bg-primary">
                        <tr>
                            <th>ID</th>
                            <th>Ảnh</th>
                            <th>Tên Sản Phẩm</th>
                            <th>Giá Bán</th>
                            <th>Giá Giảm</th>
                            <th>Màu</th>
                            <th>Active</th>
                            <th>Trạng Thái</th>
                            <th>Tùy Chỉnh</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <td>{{ $product->maSP }}</td>
                                <td><img style="width: 70px;" src='{{ asset($product->anhDaiDien) }}' alt=""></td>
                                <td>{{ $product->tenSP }}</td>
                                <td>{{ number_format($product->giaBan) }}</td>
                                <td>{{ number_format($product->giaGiam) }}</td>
                                <td>{{ $product->mauSP }}</td>
                                <td>{!! \App\Helper\Helper::active($product->active) !!}</td>
                                <td>{{ $statuses[$product->MaTrangThai] }}</td>
                                <td>
                                    <!-- dẫn đường dẫn tới trang sửa sp -->
                                    <a class="action-link edit-link" href="/admin/product/edit/{{ $product->maSP }}">Sửa</a>
                                    <a onclick="removeRow('{{ $product->maSP }}', '/admin/product/delete')" class="action-link del-link" href="#">Xóa</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
@endsection
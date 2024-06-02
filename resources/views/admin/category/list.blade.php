@extends('admin.app')
@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Danh Sách Danh Mục</h1>
    </div>
    <!-- Table product -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead class="bg-primary">
                        <tr>
                            <th>ID</th>
                            <th>Tên Danh Muc</th>
                            <th>Số Lượng SP</th>
                            <th>Active</th>                          
                            <th>Tùy Chỉnh</th>                          
                        </tr>
                    </thead>
                    <tfoot class="bg-primary">
                        <tr>
                            <th>ID</th>
                            <th>Tên Danh Muc</th>
                            <th>Số Lượng SP</th>
                            <th>Active</th>   
                            <th>Tùy Chỉnh</th>   
                        </tr>
                    </tfoot>
                    <tbody>
                         @foreach ($categories as $cate)
                            <tr>
                                <td>{{ $cate->idDanhMuc }}</td>
                                <td>{{ $cate->tenDanhMuc }}</td>
                                <td>{{ $cate->soLuongSP }}</td>
                                <td>{!! \App\Helper\Helper::active($cate->active) !!}</td>
                                <td>
                                    <!-- dẫn đường dẫn tới trang sửa sp -->
                                    <a class="action-link edit-link" href="/admin/category/edit/{{ $cate->idDanhMuc }}">Sửa</a>
                                    <a onclick="removeRowCate('{{ $cate->idDanhMuc }}', '/admin/category/delete')" class="action-link del-link" href="#">Xóa</a>
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
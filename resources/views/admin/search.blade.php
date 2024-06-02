@extends('admin.app')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Search</h1>
        </div>
        <!-- Search Results -->
        <div class="card shadow mb-4">
            @if (isset($products))
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead class="bg-primary">
                                <tr>
                                    <th>ID</th>
                                    <th>Tên Sản Phẩm</th>
                                    <th>Giá Bán</th>
                                    <th>Giá Giảm</th>
                                    <th>Màu</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($products) > 0)
                                    @foreach ($products as $product)
                                        <tr>
                                            <td>{{ $product->maSP }}</td>
                                            <td>{{ $product->tenSP }}</td>
                                            <td>{{ number_format($product->giaBan) }}</td>
                                            <td>{{ number_format($product->giaGiam) }}</td>
                                            <td>{{ $product->mauSP }}</td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="5" class="text-center">Không Tìm Thấy Sản Phẩm</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>

        </div>
        <div class="pagination-block">
            {{ $products->appends(request()->input())->links('admin.part.paginationlinks') }}
        </div>
        @endif
    </div>
@endsection

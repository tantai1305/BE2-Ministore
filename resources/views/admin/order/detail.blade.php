@extends('admin.app')
@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Chi Tiết Đơn Hàng</h1>
    </div>
    <!-- table order -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead class="bg-primary">
                        <tr>
                            <th>ID</th>
                            <th>Ảnh</th>
                            <th>Tên Sản Phẩm</th>
                            <th>Giá</th>
                            <th>Số Lượng</th>
                            <th>Thành Tiền</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $total = 0;
                        @endphp
                        @foreach($products as $product)
                        @php
                        $price = $product->giaGiam * $order_detail[$product->maSP];
                        $total += $price;
                        @endphp
                        @endphp
                        <tr>
                            <td>{{$product->maSP}}</td>
                            <td><img src="{{ asset($product->anhDaiDien) }}" alt=""></td>
                            <td>{{$product->tenSP}}</td>
                            <td>{{number_format($product->giaGiam)}}</td>
                            <td>{{$order_detail[$product->maSP]}}</td>
                            <td>{{number_format($price)}} VND</td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot class="bg-white">
                        <tr>
                            <th class="total" colspan="5">Tổng Tiền</th>
                            <th class="total" colspan="2">{{number_format($total)}} VND</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
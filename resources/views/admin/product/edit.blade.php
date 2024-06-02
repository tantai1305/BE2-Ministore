@extends('admin.app')
@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Sửa Sản Phẩm</h1>
    </div>
    <!-- Page Heading -->
    <form action="" enctype="multipart/form-data" method="post">
        @csrf
        <!-- Begin Add Product -->
        <div class="input-group main-content">
            <div class="admin-content-left col-lg-9">
                <div class="input-group-text mb-4">
                    <input type="text" placeholder="Mã Sản Phẩm" name="maSP" class="form-control mr-4" value="{{ $product -> maSP }}" readonly>
                    <input type="text" placeholder="Tên Sản Phẩm" name="tenSP" class="form-control mr-4"
                        value="{{ $product->tenSP }}">
                </div>
                <div class="input-group-text mb-4">
                    <select class="form-control mr-4" aria-label="Default select example" name="idDanhMuc">
                        <option value="" selected disabled>Danh Mục</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->idDanhMuc }}"
                                {{ $product->idDanhMuc == $category->idDanhMuc ? 'selected' : '' }}>
                                {{ $category->tenDanhMuc }}
                            </option>
                        @endforeach
                    </select>

                    <select class="form-control" aria-label="Default select example" name="maNhaSX">
                        <option value="" selected disabled>Hãng</option>
                        @foreach ($nhaSX as $NhaSanXuat)
                            <option value="{{ $NhaSanXuat->maNhaSX }}"
                                {{ $product->maNhaSX == $NhaSanXuat->maNhaSX ? 'selected' : '' }}>
                                {{ $NhaSanXuat->tenNhaSX }}
                            </option>
                        @endforeach
                    </select>

                    <select class="form-control" aria-label="Default select example" name="MaTrangThai">
                        <option value="" selected disabled>Trạng Thái</option>
                        @foreach ($trangThai as $trangThaiSP)
                            <option value="{{ $trangThaiSP->MaTrangThai }}"
                                {{ $product->MaTrangThai == $trangThaiSP->MaTrangThai ? 'selected' : '' }}>
                                {{ $trangThaiSP->TrangThai }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="input-group-text mb-4">
                    <input type="number" placeholder="Giá Bán" name="giaBan" class="form-control mr-4"
                        value="{{ $product->giaBan }}">
                    <input type="number" placeholder="Giá Giảm" name="giaGiam" class="form-control mr-4"
                        value="{{ $product->giaGiam }}">
                </div>
                <div class="input-group-text mb-4">
                    <input type="text" placeholder="Màu Sắc" name="mauSP" class="form-control mr-4"
                        value="{{ $product->mauSP }}">
                    <input type="text" placeholder="Số Lượng" name="soLuongTrongKho" class="form-control mr-4"
                        value="{{ $product->soLuongTrongKho }}">
                </div>
                <!-- gọi class của ckEditor -->
                <div class="specs">
                    <textarea name="thongSoKyThuat" class="editor1 form-control" cols="25" rows="20"
                        placeholder="Thông Số Kĩ Thuật" value="">{{ $product->thongSoKyThuat }}</textarea>
                </div>
                <textarea name="moTa" class="editor2 form-control" cols="25" rows="20" placeholder="Mô tả" value="">{{ $product->moTa }}</textarea>
                <div class="check-box mt-4">
                    <h4>Kích Hoạt</h4>
                    <div class="form-check ">
                        <input class="form-check-input" type="radio" value="1" name="active" id="active" checked>
                        <label class="form-check-label" for="active">Có</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" value="0" name="active" id="noactive">
                        <label class="form-check-label" for="noactive">Không</label>
                    </div>
                </div>
                <button class="btn btn-primary mt-4" type="submit">Sửa Sản Phẩm</button>
            </div>
            <!-- Begin add img -->
            <div class="admin-content-right col-lg-3">
                <div class="admin-content-image ml-5 mt-2">
                    <label for="file">Ảnh Đại Diện</label>
                    <input id="file" type="file">
                    <!-- thêm 2 cái id từ cái product_ajax.js để hiển thị hình -->
                    <input type="hidden" name="anhDaiDien" value="{{$product -> anhDaiDien}}" id="input-file-img-hiden">
                    <!-- Lưu đường dẫn hình ảnh vào một input ẩn -->
                    <div class="img-show" id="input-file-img"><!-- Hiển thị hình ảnh trên giao diện-->
                        <img src="{{ asset($product -> anhDaiDien) }}" alt="">
                    </div>
                </div>
                <div class="admin-content-images ml-5 mt-4">
                    <label for="files">Ảnh Sản Phẩm</label>
                    <!-- attribute "multiple" để có thể chọn nhiều file ảnh -->
                    <input id="files" type="file" multiple>
                    <div class="imgs-show" id="input-file-imgs">
                        @php
                        $product_imgs = explode("*", $product -> anhChiTiet );
                        @endphp
                        @foreach ($product_imgs as $imgs)
                            <img src="{{ asset($imgs) }}" alt="">
                            <input type="hidden" name="anhChiTiet[]" value="{{$imgs}}" id="input-file-imgs-hiden">
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
@section('footer')
    <!-- đường dẫn ckEditor -->
    <script src="{{ asset('backend/asset/ckEditor5/js/ckeditor.js') }}"></script>
    <script src="{{ asset('backend/asset/ckEditor5/js/script.js') }}"></script>
    <!-- link ajax.js -->
    <script src="{{ asset('backend/asset/js/product_ajax.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
@endsection

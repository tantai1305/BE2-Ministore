@extends('admin.app')
@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Sửa Danh Mục</h1>
    </div>
    <!-- Page Heading -->
    <form action="" enctype="multipart/form-data" method="post">
        @csrf
        <!-- Begin Add Product -->
        <div class="input-group main-content">  
            <div class="admin-content col-lg-9">  
                  <!-- Trường ẩn để lưu trữ giá trị của 'tenDanhMuc' hiện tại -->
                <input type="hidden" name="tenDanhMucOld" value="{{ $categories->tenDanhMuc }}">
                <input type="text" placeholder="Tên Danh Mục" name="tenDanhMuc" class="form-control mr-4 mb-4" value="{{ $categories->tenDanhMuc }}">
                <textarea name="moTa" class="editor2 form-control" cols="25" rows="20" placeholder="Mô tả" value="{{ $categories->moTa }}"></textarea>
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
                <button class="btn btn-primary mt-4" type="submit">Cập Nhật Danh Mục</button>
            </div>
        </div>
    </form>
@endsection
@section('footer')
    <!-- đường dẫn ckEditor -->
    <script src="{{ asset('backend/asset/ckEditor5/js/ckeditor.js') }}"></script>
    <script src="{{ asset('backend/asset/ckEditor5/js/script.js') }}"></script>
@endsection

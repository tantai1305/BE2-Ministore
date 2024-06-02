<?php

namespace App\Http\Controllers\admin;

use App\Models\SanPham;
use App\Http\Controllers\Controller;
use App\Models\DanhMuc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;


class ProductController extends Controller
{

    public function updateProduct(Request $request)
    {
        // dd($request -> all());
        // Thực hiện validation
        $validator = Validator::make($request->all(), [
            'maSP' => 'required',
            'tenSP' => 'required',
            'idDanhMuc' => 'required',
            'maNhaSX' => 'required',
            'MaTrangThai' => 'required',
            'giaBan' => 'required',
            'mauSP' => 'required',
            'soLuongTrongKho' => 'required',
            'thongSoKyThuat' => 'required',
            'moTa' => 'required',
            'anhDaiDien' => 'required',
            // 'anhChiTiet' => 'required|image|mimes:png,jpg,jpeg,webp'
        ], config('custom_messages.validation'));
        // Kiểm tra nếu validation thất bại
        if ($validator->fails()) {
            // Lấy danh sách các lỗi
            $errors = $validator->errors()->all();

            // Tìm các thông báo lỗi tương ứng trong cấu trúc config
            $errorMessages = [];
            foreach ($errors as $error) {
                $key = strtolower($error) . '.required'; // Chuyển đổi lỗi thành key trong cấu trúc config
                if (array_key_exists($key, config('custom_messages.validation'))) {
                    $errorMessages[] = config('custom_messages.validation.' . $key);
                }
            }

            // Xây dựng thông báo chi tiết về các trường nhập thiếu
            $errorMessage = implode('<br>', $errors);

            // Hiển thị thông báo lỗi
            toastr()->warning($errorMessage);
            return redirect()->back()->withInput();
        }
        // Kiểm tra giá giảm không lớn hơn giá bán
        if ($request->input('giaGiam') >= $request->input('giaBan')) {
            toastr()->warning('Giá giảm không được lớn hơn hoặc bằng giá bán');
            return redirect()->back()->withInput();
        }
        $product = SanPham::find($request->maSP);
        // Loại bỏ _token từ dữ liệu request
        $data = $request->except('_token');
        // Kiểm tra trạng thái của danh mục của sản phẩm
        $category = DanhMuc::find($product->idDanhMuc);

        if ($category->active == 0 && $data['active'] == 1) {
            toastr()->error("Không thể active sản phẩm khi danh mục của nó đang bị ẩn.");
            return redirect('/admin/product/list');
        }


        // Đặt các thuộc tính cho sản phẩm
        $product->tenSP = $data['tenSP'];
        $product->idDanhMuc = $data['idDanhMuc'];
        $product->maNhaSX = $data['maNhaSX'];
        $product->giaBan = $data['giaBan'];
        $product->giaGiam = $data['giaGiam'];
        $product->mauSP = $data['mauSP'];
        $product->soLuongTrongKho = $data['soLuongTrongKho'];
        $product->thongSoKyThuat = $data['thongSoKyThuat'];
        $product->moTa = $data['moTa'];
        $product->MaTrangThai = $data['MaTrangThai'];
        $product->active = $data['active'];
        $product->anhDaiDien = $data['anhDaiDien'];
        $productImgs = implode('*', $data['anhChiTiet']);
        $product->anhChiTiet = $productImgs;
        // dd( $product->anhChiTiet);
        // Lưu sản phẩm vào cơ sở dữ liệu
        $result = $product->save();
        if ($result == true) {
            // Hiển thị thông báo thành công
            toastr()->success(config('custom_messages.success.updated', ['timeOut' => 5000]));
        } else {
            toastr()->success(config('custom_messages.success.generic3', ['timeOut' => 5000]));
        }


        // Redirect về trang danh sách sản phẩm
        return redirect('/admin/product/list');
    }

    public function editProduct(Request $request)
    {
        $product = SanPham::find($request->maSP);
        // dd($product);
        // dd($product -> tenSP);
        $categories = DB::table('danhmuc')->get(); // Lấy tất cả các danh mục từ cơ sở dữ liệu
        $nhaSX = DB::table('nhasanxuat')->get(); // Lấy tất cả các nsx từ cơ sở dữ liệu
        $trangThai = DB::table('trangthaisp')->get(); // Lấy tất cả các trạng thái từ cơ sở dữ liệu

        return view('admin.product.edit', compact('categories', 'nhaSX', 'trangThai'), [
            'product' => $product,
        ]);
    }
    public function deleteProduct(Request $request)
    {
        $result = SanPham::find($request->maSP)->delete();

        // Xác định kết quả và đặt thông báo vào session flash
        if ($result) {
            // Xóa sản phẩm thành công
            toastr()->success(config('custom_messages.success.deleted', ['timeOut' => 5000]));
        } else {
            // Xóa sản phẩm thất bại
            toastr()->error(config('custom_messages.success.generic2', ['timeOut' => 5000]));
        }

        // Trả về kết quả dưới dạng JSON
        return response()->json(['success' => true]);
    }

    public function listProduct()
    {
        // $products = DB::table('sanpham')->get()->paginate(5);//phân trang
        $products = SanPham::orderBy('maSP', 'desc')->get();

        // Lấy danh sách trạng thái
        $statuses = DB::table('trangthaisp')->pluck('TrangThai', 'MaTrangThai'); // Thay 'status_table' bằng tên bảng chứa trạng thái
        // dd($product);
        return view('admin.product.list', [
            'products' => $products,
            'statuses' => $statuses,
        ]);
    }
    public function addProduct()
    {
        $categories = DB::table('danhmuc')->get(); // Lấy tất cả các danh mục từ cơ sở dữ liệu
        $nhaSX = DB::table('nhasanxuat')->get(); // Lấy tất cả các nsx từ cơ sở dữ liệu
        $trangThai = DB::table('trangthaisp')->get(); // Lấy tất cả các trạng thái từ cơ sở dữ liệu
        // dd($categories);

        return view('admin.product.add', compact('categories', 'nhaSX', 'trangThai')); //compact chi hiển thị ở giao diện
    }
    //chen du lieu vao db
    public function insertProduct(Request $request)
    {
        // Thực hiện validation
        $validator = Validator::make($request->all(), [
            'tenSP' => 'required',
            'idDanhMuc' => 'required',
            'maNhaSX' => 'required',
            'MaTrangThai' => 'required',
            'giaBan' => 'required',
            'giaGiam' => 'required',
            'mauSP' => 'required',
            'soLuongTrongKho' => 'required',
            'thongSoKyThuat' => 'required',
            'moTa' => 'required',
            'anhDaiDien' => 'required',
            // 'anhChiTiet' => 'required|image|mimes:png,jpg,jpeg,webp'
        ], config('custom_messages.validation'));

        // Kiểm tra nếu validation thất bại
        if ($validator->fails()) {
            // Lấy danh sách các lỗi
            $errors = $validator->errors()->all();

            // Tìm các thông báo lỗi tương ứng trong cấu trúc config
            $errorMessages = [];
            foreach ($errors as $error) {
                $key = strtolower($error) . '.required'; // Chuyển đổi lỗi thành key trong cấu trúc config
                if (array_key_exists($key, config('custom_messages.validation'))) {
                    $errorMessages[] = config('custom_messages.validation.' . $key);
                }
            }
            // Xây dựng thông báo chi tiết về các trường nhập thiếu
            $errorMessages = implode('<br>', $errors);

            // Hiển thị thông báo lỗi
            toastr()->warning($errorMessages);
            return redirect()->back()->withInput();
        }
        // Kiểm tra giá giảm không lớn hơn giá bán
        if ($request->input('giaGiam') >= $request->input('giaBan')) {
            toastr()->warning('Giá giảm không được lớn hơn hoặc bằng giá bán');
            return redirect()->back()->withInput();
        }

        // Loại bỏ _token từ dữ liệu request
        $data = $request->except('_token');

        // Tạo đối tượng SanPham mới
        $product = new SanPham();

        // Đặt các thuộc tính cho sản phẩm
        $product->tenSP = $data['tenSP'];
        $product->idDanhMuc = $data['idDanhMuc'];
        $product->maNhaSX = $data['maNhaSX'];
        $product->giaBan = $data['giaBan'];
        $product->giaGiam = $data['giaGiam'];
        $product->mauSP = $data['mauSP'];
        $product->soLuongTrongKho = $data['soLuongTrongKho'];
        $product->thongSoKyThuat = $data['thongSoKyThuat'];
        $product->moTa = $data['moTa'];
        $product->MaTrangThai = $data['MaTrangThai'];
        $product->anhDaiDien = $data['anhDaiDien'];
        $product->active = $data['active'];
        $productImgs = implode('*', $data['anhChiTiet']);
        $product->anhChiTiet = $productImgs;

        // $products = SanPham::orderBy('maSP', 'desc')->get();

        // Lưu sản phẩm vào cơ sở dữ liệu
        $product->save();
        // // Sắp xếp lại các sản phẩm theo thứ tự id giảm dần
        // $product = SanPham::orderBy('maSP', 'desc')->get();

        // Hiển thị thông báo thành công
        toastr()->success(config('custom_messages.success.added', ['timeOut' => 5000]));
        // Redirect về trang trước
        return redirect()->back();
    }
}

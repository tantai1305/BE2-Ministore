<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Controllers\SearchController;
use App\Models\DanhMuc;
use App\Models\SanPham;
use App\Models\NhaSanXuat;
use App\Models\TrangThaiSP;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class PageControl extends Controller
{
    //Controller cho web nguoi dung
    public function showPage($page = 'home')
    {
        // Kiểm tra xem view có tồn tại không
        if (view()->exists("web.$page")) {
            // Lấy dữ liệu từ cơ sở dữ liệu
            $products  = SanPham::orderBy('maSP','desc')->get();
            $danhmucs = DanhMuc::orderBy('idDanhMuc','desc')->get();
            $nhasanxuats = NhaSanXuat::orderBy('maNhaSX')->get();
            $trangthaisps = TrangThaiSP::orderBy('MaTrangThai')->get();

            // Chuyển dữ liệu vào view và trả về nó
            return view("web.$page", ['data' => $products, 'datadm' => $danhmucs, 'datansx' => $nhasanxuats, 'data_trangthai' => $trangthaisps]);
        }

        // Nếu view không tồn tại, trả về lỗi 404
        return abort(404);
    }

    public function showDetail($maSP)
    {
        // First, attempt to find the product by its ID.
        $product = SanPham::with('danhmucs.sanphams')->findOrFail($maSP);

        $relatedProducts = collect([]);
        // Check if the product has a category and fetch related products
        $relatedProducts = SanPham::where('idDanhMuc', $product->idDanhMuc)
                                   ->where('maSP', '!=', $maSP)
                                   ->limit(4) // giới hạn số lượng sản phẩm liên quan hiển thị
                                   ->get();


        // Pass the product and related products to the view
        return view('web.detail', [
            'product' => $product,
            'relatedProducts' => $relatedProducts
        ]);
    }
    
    public function getProductByCategory($idDanhMuc)
    {
        $danhMuc = DanhMuc::with('sanphams')->find($idDanhMuc);
        //dd($danhMuc);
        if (!$danhMuc) {
            return redirect()->back()->withErrors(['error' => 'Danh mục không tồn tại!']);           
        }
        //dd($danhMuc->sanphams); 
        return view('web.sanphamtheodm', [
            'danhMuc' => $danhMuc,
            'sanPhams' => $danhMuc->sanphams
        ]);
    }

    public function getSPNhaSX($maNhaSX)
    {
        $nhaSanXuat = NhaSanXuat::with('sanphams')->find($maNhaSX);

        if (!$nhaSanXuat) {
            return redirect()->back()->withErrors(['error' => 'Nhà sản xuất không tồn tại!']);
        }

        return view('web.home', [
            'nhaSanXuat' => $nhaSanXuat,
            'datansx' => $nhaSanXuat->sanphams,
            'data' => $nhaSanXuat->sanphams,
        ]);
    }
}
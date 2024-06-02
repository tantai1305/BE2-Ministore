<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Mail\OrderConfirmationSuccess;
use App\Models\donhang;
use App\Models\SanPham;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    public function orderList()
    {
        $order = donhang::orderBy('maDonHang', 'desc')->get();
        return view('admin.order.list', [
            'orders' => $order
        ]);
    }
    public function orderDetail(Request $request)
    {
        $order_detail = json_decode($request->order_detail, true);
        // dd( $order_detail);
        $product_id =  array_keys($order_detail);
        $products = SanPham::whereIn('maSP', $product_id)->get();
        // dd($products);
        return view('admin.order.detail', [
            'products' => $products,
            'order_detail' => $order_detail
        ]);
    }
    public function orderDelete(Request $request)
    {
        $result = donhang::find($request->maDonHang)->delete();
        // Xác định kết quả và đặt thông báo vào session flash
        if ($result) {
            // Xóa đơn hàng thành công
            toastr()->success("Xóa Đơn Hàng Thành Công", ['timeOut' => 5000]);
        } else {
            // Xóa đơn Hàng thất bại
            toastr()->error("Xóa Đơn Hàng Thất Bại", ['timeOut' => 5000]);
        }
        // Trả về kết quả dưới dạng JSON
        return response()->json(['success' => true]);
    }
    public function confirmOrder($token)
    {
        // Truy vấn đơn hàng từ cơ sở dữ liệu bằng mã token
        $order = donhang::where('token', $token)->first();
    
        // Kiểm tra xem đơn hàng có tồn tại không
        if (!$order) {
            // Nếu không tìm thấy đơn hàng, hiển thị thông báo lỗi và chuyển hướng người dùng
            toastr()->error('Invalid token.');
            return redirect('/');
        }
    
        // Cập nhật trạng thái của đơn hàng thành đã xác nhận
        $order->trangThai = 1;
        $order->save();
    
        // Gửi email thông báo xác nhận đơn hàng thành công
        Mail::to($order->email)->send(new OrderConfirmationSuccess());
    
        // Hiển thị thông báo xác nhận đơn hàng thành công
        toastr()->success('Order confirmed successfully.');
    
        // Chuyển hướng người dùng đến một trang hoặc route khác
        return redirect('/');
    }
}

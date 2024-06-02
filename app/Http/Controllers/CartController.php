<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Mail\OrderConfirm;
use App\Models\donhang;
use App\Models\SanPham;
use App\Notifications\EmailNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class CartController extends Controller
{
    public function addCart(Request $request)
    {
        // dd($request->all());
        $product_id = $request->product_id;
        $product_qty = $request->product_qty;
        if (is_null(Session::get('cart'))) {
            Session::put('cart', [
                $product_id => $product_qty
            ]);
            return redirect('/shop/cart');
        } else {
            $cart = Session::get('cart');
            if (Arr::exists($cart, $product_id)) {
                $cart[$product_id] = $cart[$product_id] + $product_qty;
                Session::put('cart', $cart);
                return redirect('/shop/cart');
            } else {
                $cart[$product_id] = $product_qty;
                Session::put('cart', $cart);
                return redirect('/shop/cart');
            }
        }
    }
    public function showCart()
    {
        $cart = Session::get('cart', []);

        // Kiểm tra xem giỏ hàng có tồn tại và không rỗng
        if (empty($cart)) {
            $products = [];
        } else {
            $product_id = array_keys($cart);
            $products = SanPham::whereIn('maSP', $product_id)->get();
        }

        return view('web.shopping_cart', [
            'products' => $products
        ]);
    }
    public function deleteCart(Request $request)
    {
        $cart = Session::get('cart');
        $product_id = $request->maSP;
        unset($cart[$product_id]);
        Session::put('cart', $cart);
        return redirect('/shop/cart');
    }
    public function updateCart(Request $request)
    {
        $cart =  $request->product_id;
        Session::put('cart', $cart);
        return redirect('/shop/cart');
    }
    public function sendCart(Request $request)
    {
        //validate
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'tenKhachHang' => 'required',
            'diaChi' => 'required',
            'sdt' => 'required|digits:10',
            'ghiChu' => 'max:255',
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
        //tao token
        $token = Str::random(12);
        $order = new donhang();
        $order->tenKhachHang = $request->input('tenKhachHang');
        $order->email = $request->input('email');
        $order->diaChi = $request->input('diaChi');
        $order->ghiChu = $request->input('ghiChu');
        $order->sdt = $request->input('sdt');
        $order->token = $token;
        $order_details = json_encode($request->input('product_id'));
        $order->orderDetails = $order_details;
        $order->save();
        //lay info khach hang
        $mailInfo = $order->email;
        $nameInfo = $order->tenKhachHang;
        $sdtInfo = $order->sdt;
        $diachiInfo = $order->diaChi;
        $orderDetails = json_decode($order->orderDetails, true);
        // Gửi thông báo đơn hàng cho admin
        Notification::route('mail', 'ministorelaravel@gmail.com')
            ->notify(new EmailNotification($order));
        //gui mai confirm đơn hàng cho user
        Mail::to($mailInfo)->send(new OrderConfirm($nameInfo, $sdtInfo, $diachiInfo, $orderDetails, $token));
        // Xóa giỏ hàng khỏi session
        session()->forget('cart');
        return redirect('/order/confirm')->with('orders', [$order]);
    }
}

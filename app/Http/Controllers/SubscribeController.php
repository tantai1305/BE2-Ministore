<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subscriber;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewProductNotification;
use App\Mail\SubscriptionSuccessNotification;


class SubscribeController extends Controller
{
    //
    public function subscribe(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:subscribers'
        ]);

        $subscriber = new Subscriber();
        $subscriber->email = $request->email;
        $subscriber->save();

        // Gửi email thông báo đăng ký thành công
        Mail::to($request->email)->send(new SubscriptionSuccessNotification());

        return redirect()->back()->with('success', 'Subscription successful!');
    }

    public function sendProductNotification($productName)
    {
        // Lấy danh sách tất cả người đăng ký
        $subscribers = Subscriber::pluck('email')->toArray();

        // Gửi email thông báo có sản phẩm mới cho tất cả người đăng ký
        Mail::to($subscribers)->send(new NewProductNotification($productName));
    }
}
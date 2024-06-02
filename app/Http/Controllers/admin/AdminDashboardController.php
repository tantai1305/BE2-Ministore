<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\donhang;
use App\Models\SanPham;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $totalOrders = donhang::count();
        $pendingOrders = donhang::where('trangThai', 0)->count();
        $confirmedOrders = donhang::where('trangThai', 1)->count();
        $totalProduct = SanPham::count();

        return view('admin.index', [
            'totalOrders' => $totalOrders,
            'pendingOrders' => $pendingOrders,
            'confirmedOrders' => $confirmedOrders,
            'totalProduct' => $totalProduct
        ]);
    }
}

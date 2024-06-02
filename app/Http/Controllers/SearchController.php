<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Controllers\SearchController;
use Illuminate\Http\Request;
use App\Models\SanPham;
use App\Models\DanhMuc;
use App\Models\NhaSanXuat;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $q = $request->input('q');
        $products = SanPham::where('tenSP', 'LIKE', '%' . $q . '%')->get();
        return response()->json($products);
    }

    public function index(Request $request){
        $sanpham = SanPham::all();

        $query = $request->input('query');
        if ($query) {
            $data = SanPham::where('tenSP', 'LIKE', "%{$query}%")->orWhere('moTa', 'LIKE',"%{$query}%")->get();
        }
        else {
            $data =[];
        }
        $datansx = NhaSanXuat::all();
        return view('web.home', compact('data','query','datansx'));       
    }
}

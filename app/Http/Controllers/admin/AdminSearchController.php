<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class AdminSearchController extends Controller
{
        public function search(Request $request)
        {
            $validator = Validator::make($request->all(),[
                'query' => 'required|min:2'
            ]);
            if($validator->fails()) {
                toastr()->warning("Phải nhập ít nhất 2 kí tự để có thể search tốt nhất !");
                return redirect()->back(); 
            }

            $search_text = $request->input('query');
            $products = DB::table('sanpham')->where('tenSP', 'LIKE', '%' . $search_text . '%')->paginate(2);
            return view('admin.search', ['products' => $products]);
        }
}

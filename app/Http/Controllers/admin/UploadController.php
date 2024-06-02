<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UploadController extends Controller
{
    //xử lý yêu cầu gửi một hình ảnh và trả về kết quả dưới dạng JSON
    public function uploadImage(Request $request)
    {
        // dd($request ->all()); //debug
        $fileName = time() . '-' . $_FILES['file']['name']; //tạo một tên file mới cho hình ảnh được tải lên
        $request->file('file')->storeAs('public/images/', $fileName); //hình ảnh được tải lên vào thư mục public/images
        $url = asset('storage/images/') . '/' .  $fileName; //tạo ra đường dẫn đầy đủ đến hình ảnh vừa được tải lên, để sau đó trả về cho người dùng.
        /* Dòng này trả về một phản hồi JSON cho người dùng với dữ liệu
         về việc upload hình ảnh thành công và đường dẫn đến hình ảnh vừa được tải lên.*/
        return response()->json([
            'success' => true,
            'path' => $url
        ]);
    }

    // Phương thức để xử lý yêu cầu tải lên nhiều hình ảnh và trả về kết quả dưới dạng JSON
    public function uploadimages(Request $request)
    {
        // Lấy danh sách các tệp tin được gửi từ trình duyệt
        $files = $request->file('files');
        // Mảng để lưu trữ đường dẫn của các tệp tin đã được tải lên
        $url = [];
        // Duyệt qua từng tệp tin và xử lý
        for ($i = 0; $i < count($files); $i++) {
            // Tạo tên mới cho tệp tin để đảm bảo tính duy nhất
            $fileName = time() . '-' . $files[$i]->getClientOriginalName(); //"getClientOriginalName" lấy tên gốc của tệp tin được tải lên từ trình duyệt
            // Lưu tệp tin vào thư mục 'public/images' 
            $files[$i]->storeAs('public/images', $fileName);
            // Tạo đường dẫn đầy đủ của tệp tin và thêm vào mảng
            $url[] = asset('storage/images/') . '/'  . $fileName;
        }
        // Trả về phản hồi dưới dạng JSON với thông báo thành công và đường dẫn của các tệp tin
        return response()->json([
            'success' => true,
            'paths' => $url
        ]);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SanPhamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        // DB::table('sanpham')->insert([
            // ['maSP'=>'SP01','tenSP'=>'Điện thoại Xiaomi Redmi 12 4GB'
            // ,'giaBan'=>'4000000','giaGiam'=>'3900000',
            // 'anhDaiDien'=>'1.png','anhChiTiet'=>'2.png',
            // 'mauSP'=>'Đen','moTa'=>'Vẻ ngoài đơn giản
            // Thiết kế của Xiaomi Redmi 12 4GB được lấy cảm hứng từ sự tối giản khi mặt lưng được làm từ kính bóng bẩy đi cùng với thân máy khá mỏng nhẹ mang đến vẻ ngoài thời trang, trẻ trung cùng khả năng cầm nắm tốt hơn khi sử dụng trong thời gian dài. 
            // Mặt trước của điện thoại thiết kế kiểu nốt ruồi, đồng thời các viền xung quanh được hãng tối ưu khá mỏng hứa hẹn mang đến cho bạn góc nhìn rộng hơn giúp việc giải trí trở nên trọn vẹn.
            // Màn hình lớn giải trí vui
            // Với mong muốn đem lại sự thư giãn sau giờ làm việc căng thẳng hoặc một góc nhìn rõ ràng sắc nét hơn. Xiaomi đã trang bị tấm nền IPS LCD với kích thước lên đến 6.79 inch cùng độ phân giải Full HD+ (1080 x 2460 Pixels) giúp bạn xem các nội dung trên YouTube hoặc Netflix tốt hơn. Màn hình này cho chất lượng hiển thị tốt, màu sắc chân thực, độ tương phản cao và góc nhìn rộng.
            // Redmi 12 hiển thị hình ảnh khá tốt khi ở ngoài trời nắng, không bị mờ khi máy có độ sáng tối đa lên đến 550 nits một con số ổn trong phân khúc. Ngoài ra, màn hình này còn được hỗ trợ tần số quét 90 Hz giúp cho các thao tác vuốt chạm trên máy được diễn ra mượt mà và nhanh chóng hơn.',
            // 'idDanhMuc'=>'DM01','maNhaSX'=>'SXDT03','MaTrangThai'=>'CH01',
            // 'thongSoKyThuat'=>'Thông số kỹ thuật 01','soLuongTrongKho'=>'20'],


        //     ['maSP'=>'SP02','tenSP'=>'Laptop Dell Inspiron 15 3520 i5 1235U/8GB/512GB'
        //     ,'giaBan'=>'15.190.000','giaGiam'=>'14.490.000',
        //     'anhDaiDien'=>'3.png','anhChiTiet'=>'4.png',
        //     'mauSP'=>'Đen','moTa'=>'Laptop Dell Inspiron mang trên mình sức mạnh từ bộ vi xử lý Intel Core i5 1235U cùng card tích hợp Intel UHD giúp bạn giải quyết mượt mà mọi tác vụ học tập, văn phòng cơ bản trên Word, Excel, PowerPoint,... hay đáp ứng nhu cầu thiết kế đồ họa cơ bản trên Photoshop, AI,... dễ dàng nâng lên card Iris Xe mạnh mẽ hơn bằng cách lắp thêm RAM và kích hoạt Dual Channel.',
        //     'idDanhMuc'=>'DM02','maNhaSX'=>'SXLT05','MaTrangThai'=>'HH01',
        //     'thongSoKyThuat'=>'Thông số kỹ thuật 02','soLuongTrongKho'=>'0'],

        //     ['maSP'=>'SP03','tenSP'=>'Điện thoại iPhone 15 128GB'
        //     ,'giaBan'=>'22.990.000','giaGiam'=>'19.970.000',
        //     'anhDaiDien'=>'5.png','anhChiTiet'=>'6.png',
        //     'mauSP'=>'Đen','moTa'=>'Laptop Dell Inspiron mang trên mình sức mạnh từ bộ vi xử lý Intel Core i5 1235U cùng card tích hợp Intel UHD giúp bạn giải quyết mượt mà mọi tác vụ học tập, văn phòng cơ bản trên Word, Excel, PowerPoint,... hay đáp ứng nhu cầu thiết kế đồ họa cơ bản trên Photoshop, AI,... dễ dàng nâng lên card Iris Xe mạnh mẽ hơn bằng cách lắp thêm RAM và kích hoạt Dual Channel.',
        //     'idDanhMuc'=>'DM01','maNhaSX'=>'SXDT05','MaTrangThai'=>'NB01',
        //     'thongSoKyThuat'=>'Thông số kỹ thuật 03','soLuongTrongKho'=>'0']
        // ]);
        
    }
}
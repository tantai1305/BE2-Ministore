/* Token này sẽ được máy chủ
 kiểm tra để đảm bảo rằng yêu cầu đó là hợp lệ và không phải là một phần của tấn công CSRF*/
$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
});

/**xử lý sự kiện khi người dùng chọn một tệp tin từ một phần tử input có id là "file" */
//Sự kiện này sẽ được kích hoạt khi người dùng chọn một file.

$("#file").on("change", ()=>{
    // Khi người dùng chọn một file
    var formData = new FormData(); // Tạo một đối tượng FormData để chứa dữ liệu
    var file = $("#file")[0].files[0]; // Lấy ra file đã chọn
    formData.append("file", file); // Thêm file vào FormData
    $.ajax({
        url: "/upload", // Gửi yêu cầu đến địa chỉ /upload
        processData: false, // Không xử lý dữ liệu trước khi gửi yêu cầu
        dataType: "json", // Mong đợi dữ liệu trả về là JSON
        data: formData, // Dữ liệu gửi đi là FormData
        method: "POST", // Sử dụng phương thức POST
        contentType: false, // Không thiết lập loại dữ liệu gửi đi
        success: function (result) {
            // Xử lý kết quả trả về từ máy chủ
            if (result.success == true) {
                // Nếu yêu cầu thành công
                html = ''; // Tạo biến để hiển thị hình ảnh
                html += '<img src="' + result.path + '" alt="">'; // Tạo thẻ img để hiển thị hình ảnh
                $("#input-file-img").html(html); // Hiển thị hình ảnh trên giao diện
                $("#input-file-img-hiden").val(result.path); // Lưu đường dẫn hình ảnh vào một input ẩn
            }
        },
    });
});

// Bắt sự kiện thay đổi của input file với id 'files'
$("#files").on("change", ()=>{
    var formData = new FormData(); // Khởi tạo đối tượng FormData
    var files = $("#files")[0].files; // Lấy danh sách files người dùng đã chọn
    // Duyệt qua từng file và thêm vào formData
    for (let index = 0; index < files.length; index++) {
        formData.append("files[]", files[index]);
    }

    // Thực hiện gửi AJAX request đến server
    $.ajax({
        url: "/uploads", // Đường dẫn server nhận request
        method: "POST", // Phương thức gửi là POST
        dataType: "JSON", // Kiểu dữ liệu trả về là JSON
        data: formData, // Dữ liệu gửi đi là formData
        contentType: false, // Không set contentType, sử dụng mặc định cho FormData
        processData: false, // Không xử lý dữ liệu, gửi raw data
        success: function (result) {
            // Hàm xử lý khi nhận được phản hồi thành công
            if (result.success == true) {
                // Kiểm tra nếu thành công
                {
                    html = '';
                    for (let index = 0; index < result.paths.length; index++) {
                        html +=
                            '<img src="' + result.paths[index] + '" alt=""><input type="hidden" value="' + result.paths[index] +'" class="product-images" name="anhChiTiet[]">';
                    }
                    $("#input-file-imgs").html(html); // Thêm các thẻ img vào DOM
                    $("#input-file-imgs-hiden").val(result.path); // Lưu đường dẫn hình ảnh vào một input ẩn
                }
            }
        },
    });
});
function removeRow(maSP,url) {
    if (confirm('Are You Sure')) {
        console.log(maSP,url);
        $.ajax({
            url:  url,
            data: {maSP},
            method: 'GET',
            dataType: 'JSON',
            success: function(res) {
                if (res.success == true) {
                    location.reload();
                }
            }
        })
    }
}
function removeRowCate(idDanhMuc,url) {
    if (confirm('Are You Sure')) {
        console.log(idDanhMuc,url);
        $.ajax({
            url:  url,
            data: {idDanhMuc},
            method: 'GET',
            dataType: 'JSON',
            success: function(res) {
                if (res.success == true) {
                    location.reload();
                }
                else{
                    location.reload();
                }
            }
        })
    }
}

function removeRowOrder(maDonHang,url) {
    if (confirm('Are You Sure')) {
        $.ajax({
            url:  url,
            data: {maDonHang},
            method: 'GET',
            dataType: 'JSON',
            success: function(res) {
                if (res.success == true) {
                    location.reload();
                }
                else{
                    location.reload();
                }
            }
        })
    }
}


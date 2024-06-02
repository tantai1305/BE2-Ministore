<?php

use App\Http\Controllers\admin\AdminDashboardController;
use App\Http\Controllers\admin\AdminLoginController;
use App\Http\Controllers\admin\AdminPageController;
use App\Http\Controllers\admin\AdminSearchController;
use App\Http\Controllers\admin\MenuController;
use App\Http\Controllers\admin\OrderController as AdminOrderController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\UploadController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\SignUp;
use App\Http\Controllers\PageControl;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\ResetPasswordWithOtpController;
use App\Http\Controllers\SubscribeController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\Api;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// Route::get("/",function(){
//     return view("index");
// });

//Route::get("/{name?}",function($name = "index"){
//    return view(@$name);
//})->name('page');

// Route::get("crud", function(){
//     return view('crud');
// });
// // Route::get("/login",function(){
//     return view("login");
// });

//route cho web nguoi dung
Route::get('/search', [SearchController::class, 'index'])->name('find');
Route::get('/nhasanxuat/{maNhaSX}', [PageControl::class, 'getSPNhaSX']);

Route::get("/{page?}", [PageControl::class, 'showPage'])->name('show.page');
//route cho trang admin
// Route::get("/admin/{page?}", [AdminPageController::class, 'showPageAdmin'])->name('show.pageAdmin');

//login admin
Route::get('/admin/login', [AdminLoginController::class, 'showLogin'])->name('loginAdmin');
Route::post('/admin/checkLogin', [AdminLoginController::class, 'checkLogin'])->name('checkLogin');
Route::post('/admin/logout', [AdminLoginController::class, 'logout'])->name('logoutAdmin');
//admin
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    //Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/index', [AdminDashboardController::class,'index'])->name('admin.dashboard');
    //Route search admin
    Route::get('/search',[AdminSearchController::class,'search'])->name('search');
    // route product
    Route::get('/product/list', [ProductController::class, 'listProduct'])->name('listProduct');
    Route::post('/product/add', [ProductController::class, 'insertProduct'])->name('insertProduct');
    Route::get('/product/create', [ProductController::class, 'addProduct']);
    Route::get('/product/delete', [ProductController::class, 'deleteProduct']);
    Route::get('/product/edit/{maSP}', [ProductController::class, 'editProduct'])->name('editProduct');
    Route::post('/product/edit/{maSP}', [ProductController::class, 'updateProduct'])->name('updateProduct');

    // route menu
    Route::get('/category/create', [MenuController::class, 'addCategories']);
    Route::get('/category/delete', [MenuController::class, 'deleteCategories']);
    Route::get('/category/edit/{idDanhMuc}', [MenuController::class, 'editCategories'])->name('editCategory');
    Route::post('/category/edit/{idDanhMuc}', [MenuController::class, 'updateCategories'])->name('updateCategory');
    Route::get('/category/list', [MenuController::class, 'listCategories'])->name('listCategory');
    Route::post('/category/add', [MenuController::class, 'insertCategories'])->name('insertMenu');

    // route order
    Route::get('/order/list', [AdminOrderController::class, 'orderList']);
    Route::get('/order/delete', [AdminOrderController::class, 'orderDelete']);
    Route::get('/order/detail/{order_detail}', [AdminOrderController::class, 'orderDetail']);
}); 

// route lấy đường dẫn hình
Route::post('/upload', [UploadController::class, 'uploadImage']); //lấy 1 ảnh đại diện
Route::post('/uploads', [UploadController::class, 'uploadImages']); //lấy nhiều ảnh sp




Route::get('/detail/{maSP}', [PageControl::class, 'showDetail'])->name('detail');
Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');

Route::get('/home', function () {
    return view('web.home');
})->name('home');

Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::get('register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('register', [AuthController::class, 'register']);
Route::post('logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/category/{idDanhMuc}', [PageControl::class, 'getProductByCategory'])->name('category.products');

//gio hang  
Route::get('/order/confirm', function () {
    return view('web.confirm');
});
Route::get('/order/confirm/{token}', [AdminOrderController::class, 'confirmOrder'])->name('order.confirm');
Route::get('/shop/cart', [CartController::class, "showCart"]);
Route::get('/cart/delete/{maSP}', [CartController::class, "deleteCart"]);
Route::post('/cart/update', [CartController::class, "updateCart"]);
Route::post('/cart/send', [CartController::class, "sendCart"]);
Route::post('/cart/add', [CartController::class, 'addCart'])->name('addCart');

Route::middleware('auth')->group(function () {
    // -------Profile-----------
    Route::get('update_my_profile', [ProfileController::class, 'show'])->name('profile');
    Route::post('update_my_profile/{id}', [ProfileController::class, 'updateProfile'])->name('update_profile');
    Route::delete('update_my_profile/{id}/delete', [ProfileController::class, 'destroyProfile'])->name('destroy_profile');
    Route::post('change_password', [ProfileController::class, 'changePassword'])->name('change_password');
});

//Route để change password
Route::get('forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('reset-password/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('reset-password', [ResetPasswordController::class, 'reset'])->name('password.update');
//Add map
Route::get('/googlemap', 'App\Http\Controllers\MapController@googlemap')->name('googlemap');
//Reset password
// Route để hiển thị form nhập email để gửi OTP
Route::get('password/reset/withotp', [ResetPasswordWithOtpController::class, 'showRequestForm'])->name('password.reset.withotp');

// Route để xử lý gửi OTP
Route::post('password/reset/withotp/send', [ResetPasswordWithOtpController::class, 'sendOtp'])->name('password.reset.withotp.send');

// Route để hiển thị form xác minh OTP
Route::get('password/reset/withotp/verify', [ResetPasswordWithOtpController::class, 'showVerifyForm'])->name('password.reset.withotp.verify');

// Route để xử lý xác minh OTP và reset mật khẩu
Route::post('password/reset/withotp/verify', [ResetPasswordWithOtpController::class, 'verifyOtp'])->name('password.reset.withotp.verifyOtp');
// Route cho đăng ký
Route::post('/subscribe', [SubscribeController::class, 'subscribe'])->name('subscribe');

// Route cho thông báo sản phẩm mới
Route::get('/send-product-notification/{productName}', [SubscribeController::class, 'sendProductNotification'])->name('send.product.notification');
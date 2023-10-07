<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BillController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [PageController::class, 'index'])->name('home');

Route::get('product/{id}', [PageController::class, 'product']);
Route::get('product', [PageController::class, 'sanpham_main'])->name('product');
// Route::resource('Pages', PageController::class);

Route::get('list_like', [PageController::class,'list_like'])->name('list_like');
Route::get('shopping_cart', [PageController::class,'shopping_cart'])->name('shopping_cart'); 

Route::get('product_type/{type}', [PageController::class,'product_type'])->name('product_type');  
// Route::get('contacts', [PageController::class,'contacts'])->name('contacts');
Route::get('lienhe', [ContactController::class,'getUserContacts'])->name('user.getUserContact');
//đường liên kết admin
Route::get('contacts', [ContactController::class,'getContactMail'])->name('admin.getContactMail');
Route::post('contacts', [ContactController::class,'postContactMail'])->name('admin.postContactMail');
Route::delete('contacts/{id}', [ContactController::class, 'destroy'])->name('contacts.destroy');

Route::get('about', [PageController::class,'about'])->name('about');
// Checkout page

Route::get('checkout', [PageController::class, 'checkout'])->name('banhang.getdathang');
Route::post('checkout', [PageController::class, 'postCheckout'])->name('banhang.postdathang');

// Shopping cart

Route::get('shopping_cart', [PageController::class, 'shopping_cart']);

Route::get('add-to-cart/{id}',[PageController::class,'addToCart'])->name('banhang.addToCart');
Route::get('del-cart/{id}',[PageController::class,'delCartItem'])->name('banhang.xoagiohang');

// singin page

Route::get('dangky',[PageController::class,'getSignin'])->name('getsignin');
Route::post('dangky',[PageController::class,'postSignin'])->name('postsignin');

// Login Page
Route::get('dangnhap', [UserController::class, 'getLogin'])->name('admin.getLogin');
Route::post('dangnhap', [UserController::class, 'postLogin'])->name('admin.postLogin');

// Admin page
Route::get('dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

// // Admin Page - Login
// Route::get('/admin/dangnhap', [UserController::class, 'getLogin'])->name('admin.getLogin');
// Route::post('/admin/dangnhap', [UserController::class, 'postLogin'])->name('admin.postLogin');

// Admin Page - Logout
Route::post('dangxuat', [UserController::class, 'getLogout'])->name('getLogout');

// Admin Page - Group

Route::group(['prefix' => 'admin', 'middleware' => 'AdminLoginMiddleware'], function(){
    Route::group(['prefix' => 'category'], function(){
        Route::get('danhsach', [CategoryController::class, 'getCatelist'])->name('admin.getCateList');
        Route::get('them', [CategoryController::class, 'getCateAdd'])->name('admin.getCateAdd');
        Route::post('them', [CategoryController::class, 'postCateAdd'])->name('admin.postCateAdd');
        Route::get('xoa/{id}', [CategoryController::class, 'getCateDelete'])->name('admin.getCateDelete');
        Route::get('sua/{id}', [CategoryController::class, 'getCateEdit'])->name('admin.getCateEdit');
        Route::post('sua/{id}', [CategoryController::class, 'postCateEdit'])->name('admin.postCateEdit');
    });

    Route::group(['prefix' => 'product_detail'], function(){
        Route::get('detailed-product', [PageController::class, 'getChiTiet'])->name('admin.getDetailProduct');
    });

    // Route::group(['prefix' => 'administrator'], function(){
    //     Route::get('dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    // });

    // Route::group(['prefix' => 'bills'], function(){
    //     Route::get('billList', [BillController::class, 'index'])->name('admin.getBillList');
    //     Route::get('sua/{id}', [BillController::class, 'edit'])->name('admin.getBillEdit');
    //     Route::post('sua/{id}', [BillController::class, 'update'])->name('admin.postBillEdit');
    //     Route::get('xoa/{id}', [CategoryController::class, 'destroy'])->name('admin.getBillDelete');
    // });
});

// Route::get('/admin/sanpham', function(){
//     return view('adminpages.product');
// });

// Route::get('adminproduct', [UserController::class, 'sanpham']);

// San pham admin
Route::get('sanpham-admin', [UserController::class, 'sanpham']);

Route::resource('products', ProductController::class);
Route::get('addproducts', [ProductController::class, 'create']);

// Route::get('products', [ProductController::class, 'index'])->name('sanphamadmin');

// User Admin
Route::get('/admin/edituser', [UserController::class, 'edit'])->name('users.edit');
Route::get('/admin/deleteuser', [UserController::class, 'destroy'])->name('users.destroy');
Route::get('createadminaccount', [UserController::class, 'create']);
// Route::get('/admin/createuser', [UserController::class, 'store'])->name('users.store');

Route::get('adminaccounts', [UserController::class, 'useraccount']);
Route::resource('users', UserController::class);



// Bills
Route::resource('bills', BillController::class);
Route::get('billList', [BillController::class, 'index'])->name('admin.getBillList');
Route::put('bill/{id}', [BillController::class, 'updateBillAdmin'])->name('admin.updateBill');
// Route::get('admin/editbill/{id}', [BillController::class, 'edit'])->name('admin.getBillEdit');
// Route::get('xoa/{id}', [CategoryController::class, 'destroy'])->name('admin.getBillDelete');

// List-like
// Route::get('list-Like', [PageController::class, 'list_like'])->name('admin.getListLike');
// Route::get('addList-Like/{id}', [PageController::class, 'addToList'])->name('admin.addListLike');
// Route::get('delList-Like/{id}',[PageController::class, 'delListItem'])->name('admin.delListLike');

// Category Area
// Route::get('danhmuc', [CategoryController::class, 'listCategory']);
Route::get('danhsach', [CategoryController::class, 'getCatelist'])->name('admin.getCateList');
Route::get('them', [CategoryController::class, 'getCateAdd'])->name('admin.getCateAdd');
Route::post('them', [CategoryController::class, 'postCateAdd'])->name('admin.postCateAdd');
Route::delete('xoa/{id}', [CategoryController::class, 'getCateDelete'])->name('admin.getCateDelete');
Route::get('sua/{id}', [CategoryController::class, 'getCateEdit'])->name('admin.getCateEdit');
Route::put('sua/{id}', [CategoryController::class, 'postCateEdit'])->name('admin.postCateEdit');
Route::post('/input-email',[PageController::class,'postinputEmail'])->name('postinputemail');
Route::get('/input-email',[PageController::class,'getinputEmail'])->name('getEmail');

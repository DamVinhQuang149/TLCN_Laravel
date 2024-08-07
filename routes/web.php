<?php

use App\Http\Controllers\AdvertisementController;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\CouponsController;
use App\Http\Controllers\ManufacturesController;
use App\Http\Controllers\OrderDetailsController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\PaymentsController;
use App\Http\Controllers\ProtypesController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\ForgetPasswordManager;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\EmailsController;
use App\Http\Controllers\RevenuesController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\FlashSalesController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UsersController;

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

use App\Http\Controllers\InvoiceController;

Route::get('/invoices/{order_id}', [InvoiceController::class, 'generateInvoice']);
Route::get('/admin/invoices/{order_id}', [InvoiceController::class, 'generateInvoice']);



Route::get('/login', [UsersController::class, 'login'])->name('login');
//Route::post('/login', [UsersController::class, 'postLogin']);
Route::post('/login', [UsersController::class, 'postLogin']);
Route::get('/register', [UsersController::class, 'register'])->name('register');
Route::post('/register', [UsersController::class, 'postRegister']);
Route::get('/logout', [UsersController::class, 'logout'])->name('logout');
//
Route::get('/forget-password', [ForgetPasswordManager::class, 'forgetPassword'])->name('forget.password');
Route::post('/forget-password', [ForgetPasswordManager::class, 'forgetPasswordPost']);
Route::get('/reset-password', [ForgetPasswordManager::class, 'resetPassword'])->name('reset.password');
Route::post('/reset-password', [ForgetPasswordManager::class, 'resetPasswordPost']);
//
//product
Route::get('/products/type_id={type_id}', [ProductsController::class, 'showByTypeid'])->name('products');
Route::get('/product/type_id={type_id}&id={id}', [ProductsController::class, 'detailsProduct'])->name('detail.product');
Route::get('/', [HomeController::class, 'index'])->name('index');
//search
Route::get('/products/search', [ProductsController::class, 'search'])->name('products.search');
//comment
Route::get('/post-comment/{product_id}/{comment}/{star}', [CommentsController::class, 'commentPost'])->name('comment.post');
Route::get('/comment/{comment_id}', [CommentsController::class, 'editComment'])->name('comment.edit');
Route::get('/delete-comment/{comment_id}', [CommentsController::class, 'deleteComment'])->name('comment.delete');

//favorite
Route::get('/favorite/{product_id}', [ProductsController::class, 'favorite'])->name('favorite');
Route::get('/favorite', [ProductsController::class, 'favoriteShow'])->name('favorite.show');

//cart
Route::get('/add-cart/{id}', [CartController::class, 'addCart'])->name('add.cart');
Route::get('/add-quanty-cart/{id}/{quanty}', [CartController::class, 'addQuantyCart'])->name('add.cart');
Route::get('/delete-item-cart/{id}', [CartController::class, 'deleteItemCart'])->name('delete.cart');
Route::get('/list-cart', [CartController::class, 'viewListCart'])->name('list.cart');
Route::get('/delete-list-item-cart/{id}', [CartController::class, 'deleteListItemCart']);
Route::get('/save-list-item-cart/{id}/{quanty}', [CartController::class, 'saveListItemCart']);


//email_lists
Route::post('/emails', [EmailsController::class, 'addNotify'])->name('emails.addNotify');






Route::middleware(['user'])->group(function () {
    Route::get('chat', function () {
        return view('chat');
    });
    Route::get('/profile/{user_id}', [UsersController::class, 'profileUser'])->name('profile');
    Route::get('/edit-profile/{user_id}', [UsersController::class, 'editProfileUser'])->name('editprofile');
    Route::post('/edit-profile', [UsersController::class, 'editProfileUserPost'])->name('editprofile.post');
    Route::get('/change-image/{user_id}', [UsersController::class, 'changeImageUser'])->name('changeimage');
    Route::post('/change-image-post/{user_id}', [UsersController::class, 'changeImageUserPost'])->name('changeimage.post');
    //checkout-order
    Route::get('/check-out', [CheckoutController::class, 'viewcheckout'])->name('view.checkout');
    Route::get('/unset-coupon', [CheckoutController::class, 'unsetCoupon'])->name('unset.coupon');
    // Route::get('/unset-shipping', [CheckoutController::class, 'unsetShipping'])->name('unset.shipping');
    Route::get('/process-coupon/{coupon_code}', [CheckoutController::class, 'processCoupon']);

    //shipping fee
    Route::get('/shipping-fee/{address}', [CheckoutController::class, 'shippingFee']);


    Route::post('/order', [OrdersController::class, 'order'])->name('order');
    Route::get('/onlinepayment', [OrdersController::class, 'onlinepayment'])->name('onlinepayment');
    Route::get('/thanks', [OrdersController::class, 'viewThanks'])->name('view.thanks');

    Route::get('/list-order', [OrdersController::class, 'listOrder'])->name('list.order');
    Route::get('/canceled-order/{order_id}', [OrdersController::class, 'canceledOrder'])->name('canceled.order');
    Route::get('/Reorder/{order_id}', [OrdersController::class, 'Reorder'])->name('reset.order');
    Route::get('/received-order/{order_id}', [OrdersController::class, 'receivedOrder'])->name('received.order');


    Route::get('/list-detail-order/{order_id}', [OrderDetailsController::class, 'listDetailOrder'])->name('list.detailorder');
});

//
Route::get('/login-admin', [AdminController::class, 'loginAdmin'])->name('login.admin');
Route::post('/login-admin', [AdminController::class, 'loginAdminPost'])->name('login.admin');
Route::get('/logout-admin', [AdminController::class, 'logoutAdmin'])->name('logout.admin');

Route::middleware('admin')->group(function () {
    Route::any('/admin', [PagesController::class, 'count'])->name('home_admin');
    Route::resource('/admin/revenues', RevenuesController::class);
    Route::get('/admin/products/search', [ProductsController::class, 'searchProductAdmin'])->name('products.search.admin');
    Route::resource('/admin/products', ProductsController::class);
    
    Route::resource('/admin/inventories', InventoryController::class);
    Route::resource('/admin/coupons', CouponsController::class);
    Route::resource('/admin/manufactures', ManufacturesController::class);
    Route::resource('/admin/orderdetails', OrderDetailsController::class);
    Route::resource('/admin/orders', OrdersController::class);
    Route::resource('/admin/roles', RolesController::class);
    Route::resource('/admin/status', StatusController::class);
    Route::resource('/admin/protypes', ProtypesController::class);
    Route::resource('/admin/payments', PaymentsController::class);
    Route::resource('/admin/users', UsersController::class);
    Route::resource('/admin/emails', EmailsController::class);
    Route::resource('/admin/flashsales', FlashSalesController::class);

    Route::post('/admin/comment/{id}/approve', [CommentsController::class, 'isApproveComm'])->name('comment.approve');
    Route::resource('/admin/comments', CommentsController::class);
    //
    Route::resource('/admin/advertisements', AdvertisementController::class);
    Route::get('admin/sendmailadvertisements/{id}', [AdvertisementController::class, 'sendMailAdvertisements'])->name('sendmail.ad');

    Route::get('/revenue-chart/{interval}', [RevenuesController::class, 'revenueChart']);
    Route::post('/admin/revenues/time', [RevenuesController::class, 'getTime'])
        ->name('admin.revenues.getTime');
});
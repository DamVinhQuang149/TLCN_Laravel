<?php

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



use App\Http\Controllers\HomeController;
use App\Http\Controllers\UsersController;

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;


Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('/login', [UsersController::class, 'login'])->name('login');
//Route::post('/login', [UsersController::class, 'postLogin']);
Route::post('/user', [UsersController::class, 'postLogin'])->name('user');
Route::get('/register', [UsersController::class, 'register'])->name('register');
Route::post('/register', [UsersController::class, 'postRegister']);
Route::get('/logout', [UsersController::class, 'logout'])->name('logout');
//
Route::get('/forget-password', [ForgetPasswordManager::class, 'forgetPassword'])->name('forget.password');
Route::post('/forget-password', [ForgetPasswordManager::class, 'forgetPasswordPost']);
Route::get('/reset-password', [ForgetPasswordManager::class, 'resetPassword'])->name('reset.password');
Route::post('/reset-password', [ForgetPasswordManager::class, 'resetPasswordPost']);
//

Route::middleware(['user'])->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('index');
});

//
Route::get('/login-admin', [AdminController::class, 'loginAdmin'])->name('login.admin');
Route::post('/login-admin', [AdminController::class, 'loginAdminPost'])->name('login.admin');
Route::get('/logout-admin', [AdminController::class, 'logoutAdmin'])->name('logout.admin');

Route::middleware('admin')->group(function () {
    //Route::any('/index-admin', [PagesController::class, 'index'])->name('admin.index');
    //Route::any('/', [PagesController::class, 'index'])->name('admin.index');
    Route::any('/admin', [PagesController::class, 'count'])->name('home_admin');
    Route::resource('/admin/products', ProductsController::class);
    Route::resource('/admin/coupons', CouponsController::class);
    Route::resource('/admin/manufactures', ManufacturesController::class);
    Route::resource('/admin/orderdetails', OrderDetailsController::class);
    Route::resource('/admin/orders', OrdersController::class);
    Route::resource('/admin/roles', RolesController::class);
    Route::resource('/admin/status', StatusController::class);
    Route::resource('/admin/protypes', ProtypesController::class);
    Route::resource('/admin/payments', PaymentsController::class);
    Route::resource('/admin/users', UsersController::class);
});
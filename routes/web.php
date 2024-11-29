<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\XeMayController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\AdminController;
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

Route::get('/', [XeMayController::class, 'index']);


Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/banggia-sanpham', [UserController::class, 'banggiasanpham']);
Route::get('/chinh-sach-baoduong', [UserController::class, 'chinhsachbd']);
Route::get('/chinh-sach-baohanh', [UserController::class, 'chinhsachhbb']);
Route::get('/chitiet-sanpham', [UserController::class, 'chitietsanpham']);
Route::get('/lien-he-mua-hang', [UserController::class, 'lienhemuahang']);
Route::get('/sanpham', [UserController::class, 'sanpham']);
Route::get('/thong-tin', [UserController::class, 'thongtin']);
Route::get('/index', [UserController::class, 'index']);
Route::post('/lienhe-submit', [UserController::class, 'submit'])->name('lienhe.submit');


Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('add-motor', [AdminController::class, 'addMotor'])->name('admin.add_motor');
    Route::get('detail-motor', [AdminController::class, 'detailMotor'])->name('admin.detail_motor');
// Route để hiển thị form chỉnh sửa xe
Route::get('edit-motor', [AdminController::class, 'editMotor'])->name('admin.edit_motor');
Route::put('admin/motor/update/{id}', [AdminController::class, 'update'])->name('admin.update_motor');


Route::get('delete', [AdminController::class, 'deleteMotor'])->name('admin.delete_motor');
    Route::get('list-motor', [AdminController::class, 'listMotor'])->name('admin.list_motor');
 
    Route::get('vehicle-lookup', [AdminController::class, 'search'])->name('motor.search');
    Route::post('/admin/store_motor', [AdminController::class, 'store'])->name('admin.store_motor');

});
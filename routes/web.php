<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CouponController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\PackageController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

Route::get('/admin/packages', [PackageController::class, 'index'])->name('admin.package');
Route::post('/admin/packages', [PackageController::class, 'create'])->name('admin.add.package');
Route::get('/admin/packages/edit/{id}', [PackageController::class, 'edit'])->name('admin.edit.package');
Route::post('/admin/packages/update/{id}', [PackageController::class, 'update'])->name('admin.update.package');
Route::get('/admin/packages/delete/{id}', [PackageController::class, 'delete'])->name('admin.delete.package');



// users routs
Route::get('/admin/users/add', [UserController::class, 'create'])->name('admin.user.add');
Route::post('/admin/users/add', [UserController::class, 'store'])->name('admin.user.store');
Route::get('/admin/users', [UserController::class, 'index'])->name('admin.user');
Route::get('/admin/users/edit/{id}', [UserController::class, 'edit'])->name('admin.user.edit');
Route::post('/admin/users/update/{id}', [UserController::class, 'update'])->name('admin.user.update');
Route::get('/admin/users/delete/{id}', [UserController::class, 'delete'])->name('admin.user.delete');


// users routs
Route::get('/admin/gallery', [GalleryController::class, 'index'])->name('admin.gallery');
Route::post('/admin/gallery/add', [GalleryController::class, 'create'])->name('admin.gallery.add');
Route::get('/admin/gallery/get', [GalleryController::class, 'gallery'])->name('admin.gallery.get');
// Route::get('/admin/users/edit/{id}', [UserController::class,'edit'])->name('admin.user.edit');
// Route::post('/admin/users/update/{id}', [UserController::class,'update'])->name('admin.user.update');
// Route::get('/admin/users/delete/{id}', [UserController::class,'delete'])->name('admin.user.delete');


// category routs
Route::post('/admin/category/create', [CategoryController::class, 'create'])->name('admin.category.create');
Route::get('/admin/category', [CategoryController::class, 'index'])->name('admin.category.index');
Route::get('/admin/category/edit/{id}', [CategoryController::class, 'edit'])->name('admin.category.edit');
Route::post('/admin/category/update/{id}', [CategoryController::class, 'update'])->name('admin.category.update');
Route::get('/admin/category/delete/{id}', [CategoryController::class, 'delete'])->name('admin.category.delete');


// faq routs
Route::get('/admin/faqs', [FaqController::class, 'index'])->name('admin.faq');
Route::get('/admin/faqs/add', [FaqController::class, 'add'])->name('admin.faq.add');
Route::post('/admin/faqs/add', [FaqController::class, 'store'])->name('admin.faq.store');
Route::get('/admin/faqs/edit/{id}', [FaqController::class, 'edit'])->name('admin.faq.edit');
Route::post('/admin/faqs/update/{id}', [FaqController::class, 'update'])->name('admin.faq.update');
Route::get('/admin/faqs/delete/{id}', [FaqController::class, 'delete'])->name('admin.faq.delete');

// news routs
Route::get('/admin/news', [NewsController::class, 'index'])->name('admin.new');
Route::get('/admin/news/add', [NewsController::class, 'add'])->name('admin.new.add');
Route::post('/admin/news/add', [NewsController::class, 'store'])->name('admin.new.store');
Route::get('/admin/news/edit/{id}', [NewsController::class, 'edit'])->name('admin.new.edit');
Route::post('/admin/news/update/{id}', [NewsController::class, 'update'])->name('admin.new.update');
Route::get('/admin/news/delete/{id}', [NewsController::class, 'delete'])->name('admin.new.delete');



// event routs
Route::get('/admin/events', [EventController::class, 'index'])->name('admin.event');
Route::post('/admin/events', [EventController::class, 'store'])->name('admin.event.store');
Route::get('/admin/events/edit/{id}', [EventController::class, 'edit'])->name('admin.event.edit');
Route::post('/admin/events/update/{id}', [EventController::class, 'update'])->name('admin.event.update');
Route::get('/admin/events/delete/{id}', [EventController::class, 'delete'])->name('admin.event.delete');


// coupon routs
Route::get('/admin/coupons', [CouponController::class, 'index'])->name('admin.coupon');
Route::post('/admin/coupons', [CouponController::class, 'store'])->name('admin.coupon.store');
Route::get('/admin/coupons/edit/{id}', [CouponController::class, 'edit'])->name('admin.coupon.edit');
Route::post('/admin/coupons/update/{id}', [CouponController::class, 'update'])->name('admin.coupon.update');
Route::get('/admin/coupons/delete/{id}', [CouponController::class, 'delete'])->name('admin.coupon.delete');

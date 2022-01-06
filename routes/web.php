<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Models\User;
use Illuminate\Support\Facades\DB;
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
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');


Route::get('/', function () {
    $brands = DB::table('brands')->get();
    return view('home', compact('brands'));
}); //->middleware('check')

//Category Route=================================
//All Category
Route::get('/category/all',[CategoryController::class, 'index'])->name('all_categories');
//Add Category
Route::post('/category/add',[CategoryController::class, 'store'])->name('store_category');
//Edit Category
Route::get('/category/edit/{id}',[CategoryController::class, 'edit']);
//Update Category
Route::post('/category/update/{id}',[CategoryController::class, 'update']);
//Soft Delete Category
Route::get('/softDelete/category/{id}',[CategoryController::class, 'softDelete']);
//Restore Category
Route::get('/category/restore/{id}',[CategoryController::class, 'restore']);
//Empty Category from database
Route::get('/empty/category/{id}',[CategoryController::class, 'empty']);
//=========================================================================================

//=========== Brand Route ====================
//All Brand
Route::get('/brand/all',[BrandController::class, 'index'])->name('all_brand');
//Add Brand
Route::post('/brand/add',[BrandController::class, 'store'])->name('store.brand');
//Edit Brand
Route::get('/brand/edit/{id}',[BrandController::class, 'edit']);
//Update Brand
Route::post('/brand/update/{id}',[BrandController::class, 'update']);
//delete Brand
Route::get('/brand/delete/{id}',[BrandController::class, 'delete']);
//=========================================================================================

// Multi Image ===============================
Route::get('/multi/image',[BrandController::class, 'multiImage'])->name('multi_image');
Route::post('/multi/add',[BrandController::class, 'storeImage'])->name('store.image');

// Admin ALL Route ==================
Route::get('/home/slider',[HomeController::class, 'slider'])->name('home.slider');
Route::get('/add/slider',[HomeController::class, 'addSlider'])->name('add.slider');
Route::post('/store/slider',[HomeController::class, 'storeSlider'])->name('store.slider');
Route::get('/slider/edit/{id}',[HomeController::class, 'editSlider']);
Route::post('/slider/update/{id}',[HomeController::class, 'updateSlider']);
Route::get('/slider/delete/{id}',[BrandController::class, 'deleteSlider']);
//==================================

Route::get('/contact',[ContactController::class, 'index']);

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//    $users = User::all();
//    $users = DB::table('users')->get();
    return view('admin.index');
})->name('dashboard');

Route::get('/user/logout',[BrandController::class, 'logout'])->name('user.logout');

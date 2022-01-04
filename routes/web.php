<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactController;
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

Route::get('/', function () {
    return view('welcome');
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
//Update Brand
Route::get('/brand/delete/{id}',[BrandController::class, 'delete']);
//=========================================================================================

Route::get('/contact',[ContactController::class, 'index']);

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//    $users = User::all();
    $users = DB::table('users')->get();
    return view('dashboard', compact('users'));
})->name('dashboard');

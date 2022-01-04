<?php

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
//Category Controller=========================
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
//================================================

Route::get('/contact',[ContactController::class, 'index']);

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//    $users = User::all();
    $users = DB::table('users')->get();
    return view('dashboard', compact('users'));
})->name('dashboard');

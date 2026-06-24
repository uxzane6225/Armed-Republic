<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\SaleDetailController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\UserController;
use App\Models\Product;
use App\Models\Sale;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    $total_users = User::count();
    $admin_count = User::where('role', '=', 'admin')->count();
    $user_count = User::where('role', '=', 'user')->count();
    $total_products = Product::count();
    $total_sales = Sale::count();
    return view('dashboard', compact('total_users', 'admin_count', 'user_count', 'total_products', 'total_sales'));
})->middleware(['auth', 'admin'])->name('dashboard');

Route::get('/settings', function () {
    return view('settings');
})->middleware(['auth','admin'])->name('settings');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy'); 
});

Route::resource('/users', UserController::class)->middleware(['auth', 'admin']);
Route::resource('/types', TypeController::class)->middleware(['auth','admin']);
Route::resource('/categories', CategoryController::class)->middleware(['auth','admin']);
Route::resource('/products', ProductController::class)->middleware(['auth','admin']);
Route::resource('/sales', SaleController::class)->middleware(['auth', 'admin']);
Route::resource('/saleDetails', SaleDetailController::class)->middleware(['auth','admin']);

Route::get('/pages/home', function() {
    return view('pages.home');
})->middleware(['auth', 'verified'])->name('home');

require __DIR__.'/auth.php';
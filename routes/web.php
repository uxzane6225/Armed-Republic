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
    $staff_count = User::where('role', '=', 'staff')->count();
    $customer_count = User::where('role', '=', 'customer')->count();
    $total_products = Product::count();
    $total_sales = Sale::count();

    return view('dashboard', compact('total_users', 'admin_count', 'staff_count', 'customer_count', 'total_products', 'total_sales'));
})->middleware(['auth', 'admin'])->name('dashboard');

Route::get('/settings', function () {
    return view('settings');
})->middleware(['auth', 'verified'])->name('settings');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy'); 
});

Route::resource('/users', UserController::class)->middleware(['auth', 'admin']);
Route::resource('/types', TypeController::class)->middleware(['auth','verified']);
Route::resource('/categories', CategoryController::class)->middleware(['auth','verified']);
Route::resource('/products', ProductController::class)->middleware(['auth','verified']);
Route::resource('/sales', SaleController::class)->middleware(['auth', 'verified']);
Route::resource('/saleDetails', SaleDetailController::class)->middleware(['auth','verified']);


Route::middleware(['auth','verified'])->group(function() {
    Route::get('/pages/home', function() {
        return view('pages.home');
    })->name('home');

    Route::get('pages/store', function () {
        return view('pages.store');
    })->name('store');

    Route::get('pages/articles', function () {
        return view('pages.articles');
    })->name('articles');

    Route::get('pages/forums', function () {
        return view('pages.forums');
    })->name('forums');

    Route::get('pages/contact', function () {
        return view('pages.contact');
    })->name('contact');

    Route::get('pages/about', function () {
        return view('pages.about');
    })->name('about');

    Route::get('pages/profile', function () {
        return view('pages.profile');
    })->name('profile');
});

require __DIR__.'/auth.php';
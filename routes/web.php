<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\CodeVouchersController;

//Admin
use App\Http\Controllers\Admin\DashboardAdminController;
use App\Http\Controllers\Admin\ProductsAdminController;
use App\Http\Controllers\Admin\CategoryAdminController;
use App\Http\Controllers\Admin\BannersAdminController;
use App\Http\Controllers\Admin\CodeVoucherAdminController;

use App\Http\Controllers\User\DashboardUserController;
use App\Http\Controllers\CartsController;
use App\Http\Controllers\PaymentsController;
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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/all_products', [ProductsController::class, 'index'])->name('all_products');
Route::get('/detail_product/{id}', [ProductsController::class, 'detail'])->name('detail_product');
Route::get('/code_vouchers', [CodeVouchersController::class, 'index'])->name('code_vouchers');
Route::get('/about', function () {
    return view('about');
});

Route::group(['middleware' => ['auth']], function () {
    Route::get('/dashboard', [DashboardUserController::class, 'index'])->name('dashboard-user');
    Route::get('/carts/{id}', [CartsController::class, 'index'])->name('carts');
    Route::post('/add_to_carts', [CartsController::class, 'store'])->name('carts-store');
    Route::post('/update_quantity/{id}', [CartsController::class, 'update_quantity'])->name('update-quantity');
    Route::get('/destroy_cart_item/{id}', [CartsController::class, 'destroy_cart_item'])->name('destroy-cart-item');

    Route::post('/payments', [PaymentsController::class, 'store'])->name('payments-store');
});

Route::prefix('admin')
    ->middleware(['auth', 'admin'])
    ->group(function () {
        Route::get('/', [DashboardAdminController::class, 'index'])->name('dashboard-admin');
        Route::resource('products', ProductsAdminController::class);
        Route::resource('category', CategoryAdminController::class);
        Route::resource('banners', BannersAdminController::class);
        Route::resource('code-vouchers', CodeVoucherAdminController::class);
    });

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

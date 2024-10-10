<?php

use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\User\OrderController as UserOrderController;
use App\Http\Controllers\User\CartController as UserCartController;
use App\Http\Controllers\User\ProductController as UserProductController;
use App\Http\Controllers\User\HomeController as UserHomeController;
use App\Http\Controllers\Admin\OrderController;
use Illuminate\Support\Facades\Route;

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

Route::group(['prefix' => '/admin'], function () {
    Route::get('/login',  [LoginController::class, 'login'])->name('admin.login');
    Route::post('/login',  [LoginController::class, 'checkLogin'])->name('admin.checkLogin');
    Route::get('/logout' ,[LoginController::class, 'logout']);
    Route::group(['middleware' => ['is-login']], function () {
        Route::get('/',  [HomeController::class, 'index'])->name('admin.index');
        Route::get('/new',  [HomeController::class, 'new'])->name('admin.new');
        Route::post('/create',  [HomeController::class, 'create'])->name('admin.create');
        Route::get('/edit/{id}',  [HomeController::class, 'edit'])->name('admin.edit');
        Route::post('/update',  [HomeController::class, 'update'])->name('admin.update');
        Route::post('/delete',  [HomeController::class, 'delete'])->name('admin.delete');

        Route::group(['prefix' => '/hoa-don'], function () {
            Route::get('/',  [OrderController::class, 'index'])->name('admin.orders.index');
            Route::post('/update',  action: [OrderController::class, 'update'])->name('admin.orders.update');
            Route::get('/{id}/chi-tiet',  [OrderController::class, 'detail'])->name('admin.orders.detail');
        });
    });
});

Route::prefix('/')->group(function () {
    Route::get('/', [UserHomeController::class, 'index'])->name('user.index');

    Route::group(['prefix' => '/thanh-toan'], function() {
        Route::get('/', [UserOrderController::class, 'showing'])->name('user.view_payment');
        Route::post('/xac-nhan', [UserOrderController::class, 'confirm'])->name('user.confirm');
    });

    Route::group(['prefix' => '/gio-hang'], function() {
        Route::get('/', [UserCartController::class, 'showing'])->name('user.cart.view');
        Route::post('/add', [UserCartController::class, 'creator'])->name('user.cart.add');
        Route::post('/remove', [UserCartController::class, 'removing'])->name('user.cart.remove');
        Route::post('/update-quantity', [UserCartController::class, 'updater'])->name('user.cart.update_quantity');
    });

    Route::group(['prefix' => '/san-pham'], function() {
        Route::get('/',  [UserProductController::class, 'index'])->name('user.product.index');
        foreach (array('/xi-mang', '/keo-vua-xay-dung', 'gach-da-op-lat', '/vat-lieu-chong-tham' , '/ngoi-lop') as $route) {
            Route::get($route,  [UserProductController::class, 'index'])->name('user.product.category');
        }
        Route::get('/{id}',  [UserProductController::class, 'showing'])->name('user.product.showing');
    });
});

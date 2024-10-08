<?php

use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\LoginController;
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

Route::get('/', function () {
    return view('user_views.pages.index', ['products' => [], 'hot_products' => []]);
});

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
    });
});

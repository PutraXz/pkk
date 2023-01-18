<?php

use App\Http\Controllers\Admin\DeleteProducts;
use App\Http\Controllers\Admin\EditProducts;
use App\Http\Controllers\Admin\ShowProducts;
use App\Http\Controllers\Admin\UploadProducts;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\User\CheckShopping;
use App\Http\Controllers\User\ConfirmShopping;
use App\Http\Controllers\User\DeleteShopping;
use App\Http\Controllers\User\ProductDetail;
use App\Http\Controllers\User\ShowOrder;
use App\Http\Controllers\User\ShowProducts as UserShowProducts;
use App\Http\Controllers\User\StoreShopping;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WebController;
use Illuminate\Support\Facades\Auth;
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


Auth::routes();
Route::get('/', function () {
    return view('welcome');
});
Route::get('/payment', WebController::class);
Route::post('/payment', [WebController::class, 'pay']);
Route::middleware('auth')->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::group(['middleware' => 'check-level:admin'], function (){
        Route::view('about', 'about')->name('about');
        Route::get('users', [\App\Http\Controllers\UserController::class, 'index'])->name('users.index');
        Route::get('profile', [\App\Http\Controllers\ProfileController::class, 'show'])->name('profile.show');
        Route::put('profile', [\App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
        Route::get('admin/product', ShowProducts::class)->name('product.show');
        Route::post('admin/product', UploadProducts::class)->name('product.upload');
        Route::get('admin/product/{id}', EditProducts::class)->name('product.edit');
        Route::post('admin/product/{id}',[EditProducts::class, 'update'])->name('product.update');
        Route::delete('admin/product/{id}', DeleteProducts::class)->name('product.delete');
    });
    Route::group(['middleware' => 'check-level:user'], function (){
        Route::get('/product', UserShowProducts::class);
        Route::get('/product/{id}', ProductDetail::class)->name('user.detail');
        Route::post('/product/{id}', StoreShopping::class);
        Route::get('check-out', CheckShopping::class);
        Route::get('confirm', ConfirmShopping::class);
        Route::delete('check-out/{id}', DeleteShopping::class);
        Route::get('/order', ShowOrder::class);
    });
});
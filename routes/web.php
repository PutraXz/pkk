<?php

use App\Http\Controllers\Admin\Theme\ShowController;
use App\Http\Controllers\Admin\Theme\EditController;
use App\Http\Controllers\Admin\Theme\UploadController;
use App\Http\Controllers\Admin\Theme\DeleteController;
use App\Http\Controllers\User\Theme\ShowController as UserShowTheme;
use App\Http\Controllers\User\Theme\DetailController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\User\CheckShopping;
use App\Http\Controllers\User\ToChartController;
use App\Http\Controllers\User\ConfirmShopping;
use App\Http\Controllers\User\DeleteShopping;
use App\Http\Controllers\User\ProductDetail;
use App\Http\Controllers\User\ShowOrder;
use App\Http\Controllers\User\ShowProducts as UserShowProducts;
use App\Http\Controllers\User\StoreShopping;
use App\Http\Controllers\User\Wedding\WeddingController;
use App\Http\Controllers\User\Wedding\WeddingUpload;
use App\Http\Controllers\User\Wedding\GreetStore;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WebController;
use App\Http\Controllers\ShowWedding;
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
    Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::group(['middleware' => 'check-level:admin'], function (){

        Route::view('about', 'about')->name('about');
        Route::get('users', [\App\Http\Controllers\UserController::class, 'index'])->name('users.index');
        Route::get('profile', [\App\Http\Controllers\ProfileController::class, 'show'])->name('profile.show');
        Route::put('profile', [\App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
        Route::get('dashboard/admin/themes', ShowController::class)->name('theme.show');
        Route::post('dashboard/admin/themes', UploadController::class)->name('theme.upload');
        Route::get('dashboard/admin/themes/{id}', EditController::class)->name('theme.edit');
        Route::post('dashboard/admin/themes/{id}',[EditController::class, 'update'])->name('theme.update');
        Route::delete('dashboard/admin/themes/{id}', DeleteController::class)->name('theme.delete');
    });
    Route::group(['middleware' => 'check-level:user'], function (){
        Route::get('/product', UserShowTheme::class);
        Route::post('/product', ToChartController::class);
        Route::get('/check-out', CheckShopping::class)->name('check-out');
        Route::post('check-out', [WebController::class, 'pay']);
        Route::get('confirm', ConfirmShopping::class);
        Route::delete('check-out/{id}', DeleteShopping::class);
        Route::get('/order', ShowOrder::class);
        // setting wedding
        Route::get('dashboard/setting-wedding', WeddingController::class)->name('wedding.index');
        Route::post('dashboard/setting-wedding', WeddingUpload::class);;
    });
});
Route::get('/wedding/{slug}', ShowWedding::class);
Route::post('/wedding/{slug}', GreetStore::class)->name('greets.store');
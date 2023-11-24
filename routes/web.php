<?php

use App\Http\Controllers\Admin\Theme\ThemeController;
use App\Http\Controllers\User\Shopping\CheckShopping;
use App\Http\Controllers\User\Shopping\ToChartController;
use App\Http\Controllers\User\Wedding\WeddingController;
use App\Http\Controllers\WebController;
use App\Http\Controllers\ShowWedding;
use App\Http\Controllers\User\Shopping\ShoppingController;
use App\Http\Controllers\User\Theme\ThemeController as UserTheme;
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
        Route::get('dashboard/admin/themes', [ThemeController::class, 'index'])->name('theme.show');
        Route::post('dashboard/admin/themes', [ThemeController::class, 'store'])->name('theme.upload');
        Route::get('dashboard/admin/themes/{id}', [ThemeController::class, 'edit'])->name('theme.edit');
        Route::post('dashboard/admin/themes/{id}',[ThemeController::class, 'update'])->name('theme.update');
        Route::delete('dashboard/admin/themes/{id}', [ThemeController::class, 'destroy'])->name('theme.delete');
    });

    Route::group(['middleware' => 'check-level:user'], function (){
        Route::get('/product', UserTheme::class);
        Route::post('/product', [ToChartController::class, 'chart']);
        Route::get('/check-out', CheckShopping::class)->name('check-out');
        Route::post('check-out', [WebController::class, 'pay']);
        Route::get('confirm', [ShoppingController::class, 'confirm']);
        Route::delete('check-out/{id}', [ShoppingController::class, 'destroy']);
        Route::get('/order', [ShoppingController::class, 'index']);
        
        // setting wedding
        Route::get('dashboard/setting-wedding', [WeddingController::class, 'index'])->name('wedding.index');
        Route::post('dashboard/setting-wedding', [WeddingController::class, 'store'])->name('wedding.store');;
    });
});
Route::get('/wedding/{slug}', ShowWedding::class);
Route::post('/wedding/{slug}', [WeddingController::class, 'greetStore'])->name('greets.store');

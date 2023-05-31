<?php

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

Route::get('/',[\App\Http\Controllers\HomeController::class,'index']);

Route::get('duyuruSayfasi/{id}',[\App\Http\Controllers\DuyuruSayfasiController::class,'duyurusayfasi']);
Route::get('besyobasvuruformu',[App\Http\Controllers\BesyoBasvuruFormController::class, 'besyobasvuruformu']);
Route::post('create',[App\Http\Controllers\BesyoBasvuruFormController::class, 'create'])->name('create');
Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::group(['middleware' => ['auth','Admin','verified','password.changed']], function () {
    Route::get('admin/user', [\App\Http\Controllers\Admin\UserController::class, 'index'])->name('admin_user');
    Route::get('admin/user/create', [\App\Http\Controllers\Admin\UserController::class, 'create'])->name('admin_user_create');
    Route::post('admin/user/create', [\App\Http\Controllers\Admin\UserController::class, 'store']);
    Route::get('admin/user/edit/{user}', [\App\Http\Controllers\Admin\UserController::class, 'edit'])->name('admin_user_edit');
    Route::put('admin/user/edit', [\App\Http\Controllers\Admin\UserController::class, 'update']);
    Route::get('admin/user/show/{user}', [\App\Http\Controllers\Admin\UserController::class, 'show'])->name('admin_user_show');
    Route::post('admin/user/get_data', [\App\Http\Controllers\Admin\UserController::class, 'get_data']);
    Route::delete('admin/user/delete/{user}', [\App\Http\Controllers\Admin\UserController::class, 'delete']);

    Route::get('admin/duyuru', [\App\Http\Controllers\Admin\DuyuruController::class, 'index'])->name('admin_duyuru');
    Route::get('admin/duyuru/create', [\App\Http\Controllers\Admin\DuyuruController::class, 'create'])->name('admin_duyuru_create');
    Route::post('admin/duyuru/create', [\App\Http\Controllers\Admin\DuyuruController::class, 'store']);
    Route::get('admin/duyuru/edit/{duyurus}', [\App\Http\Controllers\Admin\DuyuruController::class, 'edit'])->name('admin_duyuru_edit');
    Route::put('admin/duyuru/edit', [\App\Http\Controllers\Admin\DuyuruController::class, 'update']);
    Route::get('admin/duyuru/show/{duyurus}', [\App\Http\Controllers\Admin\DuyuruController::class, 'show'])->name('admin_duyuru_show');
    Route::post('admin/duyuru/get_data', [\App\Http\Controllers\Admin\DuyuruController::class, 'get_data']);
    Route::delete('admin/duyuru/delete/{duyurus}', [\App\Http\Controllers\Admin\DuyuruController::class, 'delete']);

});
Route::group(['middleware' => ['auth','verified','password.changed']], function () {
    Route::get('admin/home', [\App\Http\Controllers\Admin\HomeController::class,'index'])->name('admin_home');
    Route::get('admin/user/edit_profile', [\App\Http\Controllers\Admin\UserController::class, 'editProfile'])->name('admin_user_edit_profile')->middleware('password.confirm');
    Route::put('admin/user/edit_profile', [\App\Http\Controllers\Admin\UserController::class, 'updateProfile']);
    Route::get('admin/guzelSanatlarBasvuru', [\App\Http\Controllers\Admin\GuzelSanatlarBasvuruController::class,'index'])->name('admin_guzelSanatlarBasvuru');
    Route::get('admin/guzelSanatlarBasvuru/onayla/{guzelSanatlarBasvuru}', [\App\Http\Controllers\Admin\GuzelSanatlarBasvuruController::class,'onayla'])->name('admin_guzelSanatlarBasvuru_onayla');
    Route::get('admin/guzelSanatlarBasvuru/reddet/{guzelSanatlarBasvuru}', [\App\Http\Controllers\Admin\GuzelSanatlarBasvuruController::class,'reddet'])->name('admin_guzelSanatlarBasvuru_reddet');
    Route::put('admin/guzelSanatlarBasvuru/edit', [\App\Http\Controllers\Admin\GuzelSanatlarBasvuruController::class,'update']);
    Route::get('admin/guzelSanatlarBasvuru/show/{guzelSanatlarBasvuru}', [\App\Http\Controllers\Admin\GuzelSanatlarBasvuruController::class,'show'])->name('admin_guzelSanatlarBasvuru_show');
    Route::post('admin/guzelSanatlarBasvuru/get_data', [\App\Http\Controllers\Admin\GuzelSanatlarBasvuruController::class,'get_data']);
    Route::delete('admin/guzelSanatlarBasvuru/delete/{guzelSanatlarBasvuru}', [\App\Http\Controllers\Admin\GuzelSanatlarBasvuruController::class,'delete']);

    Route::get('admin/BesyoBasvuru', [\App\Http\Controllers\Admin\BesyoBasvuruController::class,'index'])->name('admin_BesyoBasvuru');
    Route::get('admin/BesyoBasvuru/onayla/{id}', [\App\Http\Controllers\Admin\BesyoBasvuruController::class,'onayla'])->name('admin_BesyoBasvuru_onayla');
    Route::get('admin/BesyoBasvuru/reddet/{besyoBasvuru}', [\App\Http\Controllers\Admin\BesyoBasvuruController::class,'reddet'])->name('admin_BesyoBasvuru_reddet');
    Route::put('admin/BesyoBasvuru/edit', [\App\Http\Controllers\Admin\BesyoBasvuruController::class,'update']);
    Route::get('admin/BesyoBasvuru/show/{besyoBasvuru}', [\App\Http\Controllers\Admin\BesyoBasvuruController::class,'show'])->name('admin_BesyoBasvuru_show');
    Route::post('admin/BesyoBasvuru/get_data', [\App\Http\Controllers\Admin\BesyoBasvuruController::class,'get_data']);
    Route::delete('admin/BesyoBasvuru/delete/{id}', [\App\Http\Controllers\Admin\BesyoBasvuruController::class,'delete']);
});

<?php

use App\Http\Controllers\Administrasi\AdministrasiController;
use App\Http\Controllers\Administrasi\PermissionController;
use App\Http\Controllers\Administrasi\UnitController;
use App\Http\Controllers\Administrasi\UserController;
use App\Http\Controllers\Administrasi\RoleController;
use App\Http\Controllers\Sdm\Pengawai;
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
});


// ROUTE APLIKASI ADMINISTRASI
Route::prefix('administrasi')->middleware(['auth','can:administrasi-modul'])->group(function(){

    Route::get('/', [AdministrasiController::class, 'index'])->name('admin.index');
    
    // USER CONTROLLER
    Route::controller(UserController::class)->group(function(){
        Route::get('/users', 'userIndex')->name('admin.user');
        Route::get('/users/create', 'userCreate')->name('admin.user.create');
        Route::post('/users/create', 'userStore')->name('admin.user.store');
        Route::get('/users/{slug}/show', 'userShow')->name('admin.user.show');
        Route::get('/users/{slug}/edit', 'userEdit')->name('admin.user.edit');
        Route::put('/users/{slug}/update', 'userUpdate')->name('admin.user.update');
        Route::get('/users/{slug}/role', 'userRole')->name('admin.user.role');
        Route::post('/users/{slug}/role', 'UserTambahRole')->name('admin.user.role.tambah');
        Route::delete('/users/{id}/role', 'UserDestroyRole')->name('admin.user.role.destroy');
        Route::delete('/users/{slug}/delete', 'userDestroy')->name('admin.user.destroy');
        Route::put('/users/{id}/reset', 'userReset')->name('admin.user.reset');
    });

    // END USER CONTROLLER

    // ROLE CONTROLLER
    Route::controller(RoleController::class)->group(function(){
        Route::get('/role', 'index')->name('admin.role');
        Route::get('/role/create', 'create')->name('admin.role.create');
        Route::post('/role/store', 'store')->name('admin.role.store');
        Route::delete('/role/{id}/delete', 'destroy')->name('admin.role.destroy');
    });
    // END ROLE CONTROLLER

    // PERMISSION CONTROLLER
    Route::controller(PermissionController::class)->group(function(){
        Route::get('/permission', 'index')->name('admin.permission');
        Route::get('/permission/create', 'create')->name('admin.permission.create');
        Route::post('/permission/store', 'store')->name('admin.permission.store');
        Route::delete('/permission/{id}/delete', 'destroy')->name('admin.permission.destroy');
    });
    // END PERMISSION CONTROLLER



    // UNIT CONTROLLER
    Route::controller(UnitController::class)->group(function(){
        Route::get('/unit', 'index')->name('admin.unit');
        Route::get('/unit/create', 'create')->name('admin.unit.create');
        Route::post('/unit/store', 'store')->name('admin.unit.store');
        Route::get('/unit/{slug}/edit', 'edit')->name('admin.unit.edit');
        Route::put('/unit/{slug}/update', 'update')->name('admin.unit.update');
        Route::delete('/unit/{id}/delete', 'destroy')->name('admin.unit.destroy');
    
    });
    // END UNIT CONTROLLER

});
// END ROUTE APLIKASI ADMINISTRASI


// ROUTE APLIKASI SARPRAS
Route::prefix('sarpras')->group(function(){


});
// END ROUTE APLIKASI SARPRAS






// SDM
Route::controller(Pengawai::class)->prefix('sdm')->group(function(){
    Route::get('/store', 'store')->name('smd.store');
});


Route::get('/dashboard', function () {
    return view('gate');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

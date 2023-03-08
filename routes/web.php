<?php

use App\Http\Controllers\Administrasi\AdministrasiController;
use App\Http\Controllers\Administrasi\UnitController;
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


// Administrasi Aplikasi
Route::controller(AdministrasiController::class)->prefix('administrasi')->group(function(){
    Route::get('/', 'index')->name('admin.index');
    
    Route::get('/users', 'userIndex')->name('admin.user');
    Route::get('/users/create', 'userCreate')->name('admin.user.create');
    Route::post('/users/create', 'userStore')->name('admin.user.store');
    Route::get('/users/show/{slug}', 'userShow')->name('admin.user.show');


    Route::get('/unit', 'index')->name('admin.user.show');

    // Test Store Session
    Route::post('/users', 'userSession')->name('admin.session');
});

Route::controller(UnitController::class)->prefix('administrasi')->group(function(){
    Route::get('/unit', 'index')->name('admin.unit');
    Route::get('/unit/create', 'create')->name('admin.unit.create');
    Route::post('/unit/store', 'store')->name('admin.unit.store');
    Route::get('/unit/{slug}/edit', 'edit')->name('admin.unit.edit');
    Route::put('/unit/{slug}/update', 'update')->name('admin.unit.update');
    Route::delete('/unit/{id}/delete', 'destroy')->name('admin.unit.destroy');
});



Route::get('/dashboard', function () {
    return view('gate');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

<?php

use App\Http\Controllers\Administrasi\AdministrasiController;
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
    
    Route::get('/user', 'userIndex')->name('admin.user');
    Route::get('/user/create', 'userCreate')->name('admin.user.create');
    Route::post('/user/create', 'userStore')->name('admin.user.store');
    Route::get('/user/{slug}/show', 'userShow')->name('admin.user.show');
    Route::get('/user/{slug}/edit', 'userEdit')->name('admin.user.edit');
});



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

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
    
    Route::get('/users', 'userIndex')->name('admin.users');
    Route::get('/users/create', 'userCreate')->name('admin.user.create');
    Route::post('/users/create', 'userStore')->name('admin.user.store');
    Route::get('/users/show/{slug}', 'userShow')->name('admin.user.show');
});



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

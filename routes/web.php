<?php

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

/*
-----------------
CATATAN TAMBAHAN
-----------------
- Gunakan Controller jika membutuhkan proses logika yang kompleks, misalnya mengambil data dari database, mengolah data, dan lain-lain.
- Selain itu lebih baik langsung return saja view nya

*/

// Route yang mengarah ke halaman home
Route::get('/', function () {
    return view('home');
})->name('home-page');

// Route yang mengarah ke halaman login dengan nama login dan controller LoginController
Route::get('/login', 'LoginController@index')->name('login-page');

// Route yang mengarah ke halaman register dengan nama register dan controller RegisterController
Route::get('/register', 'RegisterController@index')->name('register-page');
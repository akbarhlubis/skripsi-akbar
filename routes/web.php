<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Models\Event;
use App\Http\Controllers\PostController;
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
    return view('home', [
        // Limit only 3 events
        'events' => Event::latest()->limit(3)->get()
    ]);
})->name('home-page');

// Route yang mengarah ke halaman about
Route::get('/about', function () {
    return view('about');
})->name('about-page');

// Route Group yang memprefix route auth
Route::prefix('auth')->group(function () {
    // Route yang mengarah ke halaman login dengan nama login dan controller LoginController
    Route::get('login', [LoginController::class, 'index'])->name('login-page');
    // Route yang mengirimkan data login user dari laman login pada method authenticate
    Route::post('login', [LoginController::class, 'authenticate'])->name('login');

    // Route yang mengarah ke halaman logout dengan nama logout dan controller LoginController
    Route::post('logout', [LoginController::class, 'logout'])->name('logout');

    // Route yang mengarah ke halaman register dengan nama register dan controller RegisterController
    Route::get('register', [RegisterController::class, 'index'])->name('register-page');
    // Route yang mengirimkan data register user dari laman register pada method store
    Route::post('register', [RegisterController::class, 'store'])->name('register');    
});


// Route yang mengarah ke halaman posts event dengan nama posts dan controller PostController
Route::get('posts', [PostController::class, 'index'])->name('posts-page');
// Route yang mengarah ke halaman post event dengan id post dan controller PostController
Route::get('posts/{id}', [PostController::class, 'show'])->name('post-page');
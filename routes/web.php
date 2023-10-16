<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Models\Event;
use App\Http\Controllers\PostController;
use Illuminate\Routing\RouteGroup;
use App\Models\Category;
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

// Group route yang membutuhkan auth
Route::group(['middleware' => ['auth']], function () {

    // Route yang mengarah ke halaman event saya
    Route::prefix('user')->group(function(){
        Route::get('/my-events', function () {
            return view('my-events');
        })->name('my-events-page');
    });

    // Route yang mengarah ke halaman admin dashboard menggunakan prefix admin
    Route::prefix('admin')->group(function(){
        
        // Route yang mengarah ke halaman dashboard
        Route::get('/', DashboardController::class)->name('admin-dashboard-page');

        // Route yang mengarah ke halaman event
        Route::group(['prefix' => 'events', 'as' => 'event.'], function () {
            
            Route::delete('/{event}', [EventController::class, 'destroy'])->name('destroy');
            Route::get('/', [EventController::class, 'index'])->name('index');
            Route::get('/{event}/edit', [EventController::class, 'edit'])->name('edit');
            Route::put('/{event}', [EventController::class, 'update'])->name('update');
            
            // create route for users is create and store
            Route::get('/create', [EventController::class, 'create'])->name('create');
            Route::post('/', [EventController::class, 'store'])->name('store');
            
            // route for search
            Route::get('/search', [EventController::class, 'search'])->name('search');
        });

        // Route yang mengarah ke halaman category
        Route::group(['prefix' => 'categories', 'as' => 'category.'], function () {
            
            Route::delete('/{event}', [CategoryController::class, 'destroy'])->name('destroy');
            Route::get('/', [CategoryController::class, 'index'])->name('index');
            Route::get('/{event}/edit', [CategoryController::class, 'edit'])->name('edit');
            Route::put('/{event}', [CategoryController::class, 'update'])->name('update');
            
            // create route for users is create and store
            Route::get('/create', [CategoryController::class, 'create'])->name('create');
            Route::post('/', [CategoryController::class, 'store'])->name('store');
        });

        // Route yang mengarah ke halaman users
        Route::group(['prefix' => 'users', 'as' => 'users.'], function () {
            
            Route::delete('/{user}', [UserController::class, 'destroy'])->name('destroy');
            Route::get('/', [UserController::class, 'index'])->name('index');
            Route::get('/{user}/edit', [UserController::class, 'edit'])->name('edit');
            Route::put('/{user}', [UserController::class, 'update'])->name('update');
            
            // create route for users is create and store
            Route::get('/create', [UserController::class, 'create'])->name('create');
            Route::post('/', [UserController::class, 'store'])->name('store');
            
            // route for search
            Route::get('/search', [UserController::class, 'search'])->name('search');
        });

        // Route yang mengarah ke halaman setting
        Route::get('/setting', function () {
            return view('admin.setting');
        })->name('admin-setting-page');
    });
    
});
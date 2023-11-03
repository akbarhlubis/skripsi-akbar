<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\ForgotPasswordController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MyEventController;
use App\Http\Controllers\RegisterController;
use App\Models\Event;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\RsvpController;
use Illuminate\Routing\RouteGroup;
use App\Models\Category;
use App\Models\Registration;

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

// Route yang mengarah ke halaman test
Route::get('/test', function () {
    return view('test');
})->name('test-page');

// Route yang mengarah ke halaman home
Route::get('/', function () {
    return view('home', [
        // Limit only 3 events
        'events' => Event::published()->latest()->limit(3)->get(),
        'categories' => Category::latest()->limit(6)->get(),
        'registrations' => Registration::latest()->limit(6)->get(),
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

// Route yang mengatur forgot password
Route::get('/forgot-password', [ForgotPasswordController::class, 'index'])->middleware('guest')->name('forgot-password-page');
Route::post('/forgot-password', [ForgotPasswordController::class, 'store'])->middleware('guest')->name('forgot-password');

// Route yang mengatur reset password
Route::get('/reset-password/{token}', [ResetPasswordController::class,'index'])->middleware('guest')->name('password.reset');
Route::post('/reset-password', [ResetPasswordController::class, 'reset'])->middleware('guest')->name('password.update');

// Route yang mengarah ke halaman posts event dengan nama posts dan controller PostController
Route::get('posts', [PostController::class, 'index'])->name('posts-page');
// Route yang mengarah ke halaman post event dengan id post dan controller PostController
Route::get('posts/{id}', [PostController::class, 'show'])->name('post-page');
Route::get('/events-rsvp/{id}', RsvpController::class)->name('rsvp')->middleware('auth');
// route for scan barcode
Route::get('/scan', function () {
    return view('scan');
})->name('scan-page')->middleware('auth');
// Group route yang membutuhkan auth
Route::group(['middleware' => ['auth']], function () {

    // Route yang mengarah ke halaman event saya
    Route::prefix('user')->group(function(){
        Route::get('/my-events', MyEventController::class)->name('my-events-page');

        // Route yang mengarah ke halaman profile saya dengan controller ProfileController
        Route::get('/profile',[ProfileController::class,'index'])->name('profile-page');
        // Route yang update profile saya dengan controller ProfileController
        Route::put('/profile/{user}',[ProfileController::class,'update'])->name('profile.update');
        // Route yang menghapus akun
        Route::delete('/profile/{user}',[ProfileController::class,'destroy'])->name('profile.destroy');
    });

    // Route yang mengarah ke halaman admin dashboard menggunakan prefix admin
    Route::prefix('admin')->middleware('role:admin')->group(function(){
        
        // Route yang mengarah ke halaman dashboard
        Route::get('/', DashboardController::class)->name('admin-dashboard-page');

        // Route yang mengarah ke halaman event
        Route::group(['prefix' => 'events', 'as' => 'event.'], function () {
            
            Route::get('/create', [EventController::class, 'create'])->name('create');
            Route::post('/', [EventController::class, 'store'])->name('store');
            Route::delete('/{event}', [EventController::class, 'destroy'])->name('destroy');
            Route::get('/', [EventController::class, 'index'])->name('index');
            Route::get('/{event}/edit', [EventController::class, 'edit'])->name('edit');
            Route::get('/{event}/status', [EventController::class, 'status'])->name('status');
            // create route for users is create and store
            // Show event by id
            Route::get('/{event}', [EventController::class, 'show'])->name('show');
            Route::put('/{event}', [EventController::class, 'update'])->name('update');
            
            
            // route for search
            Route::get('/search', [EventController::class, 'search'])->name('search');
        });

        // Route yang mengarah ke halaman category
        Route::group(['prefix' => 'categories', 'as' => 'category.'], function () {
            
            Route::delete('/{category}', [CategoryController::class, 'destroy'])->name('destroy');
            Route::get('/', [CategoryController::class, 'index'])->name('index');
            Route::get('/{category}/edit', [CategoryController::class, 'edit'])->name('edit');
            Route::put('/{category}', [CategoryController::class, 'update'])->name('update');
            
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
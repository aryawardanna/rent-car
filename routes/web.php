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

Route::get('/', [\App\http\Controllers\Frontend\HomepageController::class,'index'])->name('homepage');
Route::get('daftar-mobil', [\App\http\Controllers\Frontend\CarController::class,'index'])->name('car.index');
Route::get('daftar-mobil/{car}', [\App\http\Controllers\Frontend\CarController::class,'show'])->name('car.show');
Route::post('daftar-mobil', [\App\http\Controllers\Frontend\CarController::class,'store'])->name('car.store');
Route::get('blog', [\App\http\Controllers\Frontend\BlogController::class,'index'])->name('blog.index');
Route::get('blog/{blog:slug}', [\App\http\Controllers\Frontend\BlogController::class,'show'])->name('blog.show');
Route::get('tentang-kami',[\App\http\Controllers\Frontend\AboutController::class,'index']);
Route::get('kontak', [\App\http\Controllers\Frontend\ContactController::class,'index']);
Route::post('kontak', [\App\http\Controllers\Frontend\ContactController::class,'store'])->name('contact.store');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth','is_admin'],'prefix' => 'admin','as' => 'admin.'],function () {
    Route::get('users', [\App\Http\Controllers\UserController::class, 'index'])->name('users.index');

    Route::get('profile', [\App\Http\Controllers\ProfileController::class, 'show'])->name('profile.show');
    Route::put('profile', [\App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
    Route::resource('cars', \App\Http\Controllers\Admin\CarController::class);
    Route::resource('types', \App\Http\Controllers\Admin\TypeController::class);
    Route::resource('testimonials', \App\Http\Controllers\Admin\TestimonialController::class);
    Route::resource('teams', \App\Http\Controllers\Admin\TeamController::class);
    Route::resource('settings', \App\Http\Controllers\Admin\SettingController::class)->only(['index','store','update']);
    Route::resource('contacts', \App\Http\Controllers\Admin\ContactController::class)->only(['index','destroy']);
    Route::resource('bookings', \App\Http\Controllers\Admin\BookingController::class)->only(['index','destroy']);
    Route::resource('blogs', \App\Http\Controllers\Admin\BlogController::class);
});


// member
Route::get('loginmember', [\App\Http\Controllers\Member\LoginMemberController::class, 'showLoginForm'])->name('member.login');
Route::post('/login-member', [\App\Http\Controllers\Member\LoginMemberController::class, 'login'])->name('login.members');

Route::get('registermember', [\App\Http\Controllers\Member\RegisterMemberController::class, 'showRegisterForm'])->name('member.register');

Route::post('/registernow', [\App\Http\Controllers\Member\RegisterMemberController::class, 'register'])->name('registernow');


Route::middleware(['members'])->group(function () {
    Route::get('/dashboard', [\App\Http\Controllers\Member\DashboardMemberController::class, 'index']);
    // Tambahkan rute-rute lain yang memerlukan middleware 'members' di sini

    Route::get('/cars-member', [\App\Http\Controllers\Member\CarsMemberController::class, 'index'])->name('member.cars.index');
    Route::get('booking-cars-member/{carId}', [\App\Http\Controllers\Member\CarsMemberController::class, 'booking'])->name('member.cars.booking');
    Route::post('store_booking', [\App\Http\Controllers\Member\CarsMemberController::class, 'store_booking'])->name('member.cars.storebooking');

    Route::get('/peminjaman-member', [\App\Http\Controllers\Member\PeminjamanMemberController::class, 'index'])->name('member.peminjaman.index');

    Route::get('retur-peminjaman-member/{bookingId}', [\App\Http\Controllers\Member\PeminjamanMemberController::class, 'return'])->name('member.peminjaman.retur');

    Route::post('store_retur', [\App\Http\Controllers\Member\PeminjamanMemberController::class, 'store_retur'])->name('member.peminjaman.storeretur');

    Route::get('/pengembalian-member', [\App\Http\Controllers\Member\PegembalianMemberController::class, 'index'])->name('member.pengembalian.index');

    Route::get('retur-pengembalian-member/{returId}', [\App\Http\Controllers\Member\PegembalianMemberController::class, 'retur'])->name('member.pengembalian.pay');

    Route::put('/pengembalian/payment', [\App\Http\Controllers\Member\PegembalianMemberController::class, 'payment'])->name('member.pengembalian.payment');

});

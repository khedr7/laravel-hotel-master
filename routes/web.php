<?php

use App\Http\Controllers\Admin\RoomController;
use App\Http\Controllers\Admin\RoomTypeController;
use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\Admin\OfferController;
use App\Http\Controllers\Admin\ReservationController;
use App\Http\Controllers\Admin\ReviewController;
use App\Http\Controllers\Admin\RoomServicesController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\TransactionController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoomServiceRequestController;
use App\Http\Controllers\EmployeesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CustomerController;

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

Route::get('/', [HomeController::class, 'index'])->name('home')->middleware('auth');

Auth::routes();

// to be deleted
Route::group(['middleware' => 'auth'], function () {
    Route::view('rtl-support', 'pages.language')->name('language');
});

Route::group(['middleware' => 'auth', 'prefix' => '/admin', 'as' => 'admin.'], function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::resource('users', UserController::class)->except('show');
    Route::get('profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::resource('employees', EmployeesController::class);
    Route::put('profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::resource('messages', MessageController::class);
    Route::put('profile/password', [ProfileController::class, 'password'])->name('profile.password');
    Route::resource('room-types', RoomTypeController::class);
    Route::resource('rooms', RoomController::class);

    Route::resource('reviews', ReviewController::class);

    Route::resource('reservations', ReservationController::class)->except('show');
    Route::resource('transactions', TransactionController::class)->except('show');
    Route::get('users/{user}/password', [UserController::class, 'password'])->name('users.password');
    Route::put('users/{user}/password', [UserController::class, 'password'])->name('users.password');
    Route::resource('users', UserController::class);
    Route::resource('settings', SettingController::class);
    Route::resource('room-services', RoomServicesController::class);
    Route::resource('room-service-requests', RoomServiceRequestController::class);
    Route::resource('reviews', ReviewController::class);
    Route::resource('offers', OfferController::class);
    route::resource('customers', CustomerController::class);
});

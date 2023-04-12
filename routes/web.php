<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ResidentController;
use App\Http\Controllers\HouseController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\AdminController;


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

Route::get('/', function()
{
    return view('login');
})->name('login');

Route::post('login/check',[LoginController::class, 'login'])->name('login.check');
Route::get('logout',[LoginController::class, 'logout'])->name('logout');

Route::get('forget-password', function() {
    return view('users.forget-password');
})->name('forget-password');
Route::post('users/forgetpassword', [UserController::class, 'forgetpassword'])->name('forgetpassword');
Route::get('/forget/{id}', [UserController::class, 'forget'])->name('forget');
Route::post('forgetpassword/{user}/store', [UserController::class, 'forgetstore'])->name('forgetpassword.store');

Route::middleware(['auth'])->group(function () {

    Route::get('/home', function()
    {
        return view('home');
    });
    Route::get('moderator/home', function()
    {
        return view('moderators.home');
    });

    Route::resource('users', UserController::class);
    Route::get('home', [UserController::class, 'home1'])->name('user.home');
    Route::get('users/profile/edit', [UserController::class, 'profileEdit'])->name('user.profile.edit');
    Route::post('users/profile/update/{user}', [UserController::class, 'profileupdate'])->name('user.profile.update');
    Route::get('users/report', [UserController::class, 'report'])->name('user.report');
    Route::get('users/profile', [UserController::class, 'profile'])->name('user.profile');
    Route::post('users/reset-password/{user}', [UserController::class, 'resetPassword'])->name('user.resetpassword');

    Route::resource('houses', HouseController::class);

    Route::resource('residents', ResidentController::class);

    Route::resource('payments', PaymentController::class);
    Route::post('ajax', [PaymentController::class, 'ajax'])->name('ajax');

    Route::resource('admins/expenses', AdminController::class)->middleware('userType');
});


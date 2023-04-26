<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ResidentController;
use App\Http\Controllers\HouseController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\AdminController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


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

Route::get('/', function () {
    if (Auth::check()) {
        if (auth()->user()->usertype_id == User::ADMIN) {

            return redirect('home')->with('success', 'Welcome Admin');
        } elseif (auth()->user()->usertype_id == User::RESIDENT) {

            return redirect()->route('user.home')
                ->with('success', 'Welcome Resident');
        } else {

            return redirect('home')
                ->with('success', 'Welcome Moderator');
        }
    }

    return view('login');
})->name('login');

Route::post('login/check', [LoginController::class, 'login'])->name('login.check');
Route::get('logout', [LoginController::class, 'logout'])->name('logout');

Route::get('forget-password', function () {
    return view('users.forget-password');
})->name('forget-password');
Route::post('users/forgetpassword', [UserController::class, 'forgetpassword'])->name('forgetpassword');
Route::get('/forget/{id}', [UserController::class, 'forget'])->name('forget');
Route::post('forgetpassword/{user}/store', [UserController::class, 'forgetstore'])->name('forgetpassword.store');

Route::middleware(['auth', 'disable_back_btn'])->group(function () {

    Route::get('/home', function () {
        return view('home');
    });
    Route::post('users/image/store', [UserController::class, 'imagestore'])->name('users.image.store');
    Route::get('admin/profile', [UserController::class, 'adminProfile'])->name('admin.user.profile');

    Route::get('users/profile', [UserController::class, 'profile'])->name('user.profile');
    Route::get('users/profile/edit', [UserController::class, 'profileEdit'])->name('user.profile.edit');
    Route::post('users/profile/update/{user}', [UserController::class, 'profileupdate'])->name('user.profile.update');
    Route::get('/users/home', [UserController::class, 'home'])->name('user.home');
    Route::get('users/report', [UserController::class, 'report'])->name('user.report');
    Route::get('admin/reset-password/{user}', [UserController::class, 'resetcreate'])->name('admin.reset');
    Route::get('users/reset-password/{user}', [UserController::class, 'userresetcreate'])->name('user.reset');
    Route::post('users/reset-password/{user}', [UserController::class, 'resetPassword'])->name('user.resetpassword');

    Route::resource('users', UserController::class);

    Route::resource('houses', HouseController::class);

    Route::resource('residents', ResidentController::class)->except(['create']);;
    Route::get('residents/create/{id?}', [ResidentController::class, 'create'])->name('residents.create');

    Route::resource('payments', PaymentController::class);
    Route::post('ajax', [PaymentController::class, 'ajax'])->name('ajax');

    Route::resource('admins/expenses', AdminController::class);
});


Route::get('/report', function () {
    $months = config('global.months');

    return view('report', compact('months'));
});
Route::post('report/data', [AdminController::class, 'report'])->name('report.data');

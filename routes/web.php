<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ResidentController;
use App\Http\Controllers\HouseController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\AdminController;
use App\Models\User;

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
Route::get('/forget/{token}', [UserController::class, 'forget'])->name('forget');
Route::post('forgetpassword/{user}/store', [UserController::class, 'forgetstore'])->name('forgetpassword.store');

Route::middleware(['auth'])->group(function(){
    
    Route::get('users/profile', [UserController::class, 'profile'])->name('user.profile');
    Route::get('users/profile/edit', [UserController::class, 'profileEdit'])->name('user.profile.edit');
    Route::post('users/reset-password/{user}', [UserController::class, 'resetPassword'])->name('user.resetpassword');
    Route::post('users/profile/update/{user}', [UserController::class, 'profileupdate'])->name('user.profile.update');
    Route::post('ajax', [PaymentController::class, 'ajax'])->name('ajax');
    Route::get('/users/home', [UserController::class, 'home'])->name('user.home');
    Route::get('users/report', [UserController::class, 'report'])->name('user.report'); 
});

Route::middleware(['auth','user-access:'.User::ADMIN])->group(function() {
    Route::get('/home', function()
    {
        return view('home');

    })->name('home');
    Route::get('admin/profile', [UserController::class, 'adminProfile'])->name('admin.user.profile');
    Route::get('residents/create/{id?}', [ResidentController::class,'create'])->name('residents.create');
    Route::resource('payments', PaymentController::class);
    Route::resource('admins/expenses', AdminController::class)->middleware('userType');
    Route::resource('residents', ResidentController::class)->except(['create']);;
    Route::resource('houses', HouseController::class);
    Route::resource('users', UserController::class);
});

Route::middleware(['auth','user-access:'.User::MODERATOR])->group(function() {
    Route::get('/home', function()
    {
        return view('home');

    })->name('home');
    Route::get('admin/profile', [UserController::class, 'adminProfile'])->name('admin.user.profile');
    Route::resource('payments', PaymentController::class)->except(['create','store','destroy','edit','update']);
    Route::resource('admins/expenses', AdminController::class)->except(['create','store','destroy','edit','update']);
    Route::resource('residents', ResidentController::class)->except(['create','store','destroy','edit','update']);
    Route::resource('houses', HouseController::class)->except(['create','store','destroy','edit','update']);
    Route::resource('users', UserController::class)->except(['create','store','destroy','edit','update']);
}); 



Route::middleware(['auth','user-access:'.User::RESIDENT])->group(function() {
    Route::resource('users', UserController::class)->except(['index','create','store','destroy','edit','update']);
});

    





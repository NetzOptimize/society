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
});

Route::get('/home', function()
{
    return view('home');
});

Route::get('moderator/home', function()
{
    return view('moderators.home');
});

Route::post('login/check',[LoginController::class, 'login'])->name('login.check');

Route::get('logout',[LoginController::class, 'logout'])->name('logout');



//users



Route::get('users', [UserController::class, 'index'])->name('user.index');

Route::get('users/home', [UserController::class, 'home'])->name('user.home');

Route::get('users/create', [UserController::class, 'create'])->name('user.create');
Route::post('users/store', [UserController::class, 'store'])->name('user.store');

Route::get('users/edit/{user}', [UserController::class, 'edit'])->name('user.edit');
Route::post('users/update/{user}', [UserController::class, 'update'])->name('user.update');

Route::delete('users/delete/{id}', [UserController::class, 'delete'])->name('user.delete');

Route::get('users/profile/edit', [UserController::class, 'profileEdit'])->name('user.profile.edit');

Route::post('users/profile/update/{user}', [UserController::class, 'profileupdate'])->name('user.profile.update');

Route::get('users/report', [UserController::class, 'report'])->name('user.report');

Route::get('users/profile', [UserController::class, 'profile'])->name('user.profile');

Route::post('users/reset-password/{user}', [UserController::class, 'resetPassword'])->name('user.resetpassword');


//houses

Route::get('houses', [HouseController::class, 'index'])->name('house.index');

Route::get('houses/create', [HouseController::class, 'create'])->name('house.create');
Route::post('houses/store', [HouseController::class, 'store'])->name('house.store');

Route::get('houses/{house}/edit', [HouseController::class, 'edit'])->name('house.edit');
Route::post('houses/{house}/update', [HouseController::class, 'update'])->name('house.update');

Route::delete('houses/{house}/delete', [HouseController::class, 'delete'])->name('house.delete');

Route::get('houses/{house}/detail', [HouseController::class, 'detail'])->name('house.detail');

//resident
Route::get('resident', [ResidentController::class, 'index'])->name('resident.index');

Route::get('resident/create', [ResidentController::class, 'create'])->name('resident.create');
Route::post('resident/store', [ResidentController::class, 'store'])->name('resident.store');

Route::get('resident/{resident}/edit', [ResidentController::class, 'edit'])->name('resident.edit');
Route::post('resident/{resident}/update', [ResidentController::class, 'update'])->name('resident.update');

Route::delete('resident/{resident}/delete', [ResidentController::class, 'delete'])->name('resident.delete');

//PAYMENT
Route::get('payments', [PaymentController::class, 'index'])->name('payment.index');
Route::get('payment/create', [PaymentController::class, 'create'])->name('payment.create');
Route::post('payment/store', [PaymentController::class, 'store'])->name('payment.store');

//admin

Route::get('expenses', [AdminController::class, 'index'])->name('admin.expense.index');
Route::get('expenses/create', [AdminController::class, 'expenses'])->name('admin.expense');
Route::post('expenses/store', [AdminController::class, 'store'])->name('admin.expense.store');

//ajax

Route::post('ajax', [PaymentController::class, 'ajax'])->name('ajax');




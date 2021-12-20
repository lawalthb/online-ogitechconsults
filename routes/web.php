<?php

use App\Http\Controllers\AdvertiseController;
use App\Http\Controllers\BankTransferController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});
//route to apply for adv by guest
Route::get('/applyads', function () {
    return view('guest-register');
});

Route::get('/email', function () {
    return view('Email.newlyRegister');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//admin portfolio management

Route::resource('advertise', AdvertiseController::class);

//for bank transfer
Route::resource('bank_transfer', BankTransferController::class);


<?php

use App\Models\Invoice;
use Illuminate\Support\Facades\Auth;
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
    return view('dashboard.login');
})->name('show_login');

Route::controller(\App\Http\Controllers\InvoiceController::class)->group(function () {
    Route::get('/add/invoice', 'invoice')->name('add_invoice');
    Route::post('/add', 'add_new_invoice')->name('add_new_invoice');
    Route::get('/all_invoice', 'all_invoice')->name('all_invoice');
    Route::get('/previously_sent_invoice', 'previously_sent_invoice')->name('previously_sent_invoice');
    Route::get('/sent_invoice', 'sent_invoice')->name('sent_invoice');
    Route::get('/dashboard', 'dashboard')->name('dashboard')->middleware('auth');
    Route::post('/send/invoice/mail', 'send_email')->name('send_invoice');
});

Route::controller(\App\Http\Controllers\AuthenticationController::class)->group(function () {
    Route::get('/show/register', 'show_register')->name('show_register');
    Route::get('/show/login', 'show_login');
    Route::post('/auth/login', 'auth_login')->name('auth_login');
    Route::post('/register/account', 'register_account')->name('register_account');
    Route::get('/auth/logout', 'logout')->name('auth_logout');

});

Auth::routes();
//
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


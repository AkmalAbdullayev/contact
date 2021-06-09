<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\MobileNumberController;
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

Route::resource('contact', ContactController::class);
Route::resource('email', EmailController::class);
Route::resource('mobile', MobileNumberController::class);

Route::get('contact/{contact_id}/emails', [ContactController::class, 'emails'])->name('emails');
Route::get('contact/{contact_id}/numbers', [ContactController::class, 'numbers'])->name('numbers');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

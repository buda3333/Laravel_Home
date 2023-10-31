<?php

use App\Http\Controllers\PhoneController;
use App\Http\Controllers\RecordController;
use App\Http\Controllers\RecordControllerNew;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TelegramController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SpecialistController;

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
Route::get('/registration', [RegisterController::class, 'show'])->middleware('guest')->name('register.perform');
Route::post('/registration', [RegisterController::class, 'register']);
Route::get('/login', [LoginController::class, 'show'])->middleware('guest')->name('login.perform');
Route::post('/login', [LoginController::class, 'login']);
Route::get('/logout', [LogoutController::class, 'perform']);
Route::get('/home', [HomeController::class, 'index']);
Route::get('/service/{id}', [ServiceController::class, 'index']);//->where('id', '[0-9]+');
Route::get('/service', [ServiceController::class, 'show']);
Route::get('/specialist', [SpecialistController::class, 'index']);
Route::get('/record', [RecordController::class, 'index'])->name('register.record');
Route::post('/record', [RecordController::class, 'create']);
Route::get('/records/{user_id}', [RecordController::class, 'store']);
Route::get('/record2', [RecordControllerNew::class, 'index'])->name('register.record2');
Route::post('/record2', [RecordControllerNew::class, 'index2']);
Route::post('/record3', [RecordControllerNew::class, 'store'])->name('register.record3');
Route::post('/record4', [RecordControllerNew::class, 'store2'])->name('register.record4');
Route::post('/record5', [RecordControllerNew::class, 'code'])->name('register.record5');
Route::post('/record6', [RecordControllerNew::class, 'create'])->name('register.record6');
Route::post('/verify-phone', [PhoneController::class,'verify'])->name('verify.phone');
Route::post('/confirm-code', [PhoneController::class,'confirm']);
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

Route::get('/telegram', [TelegramController::class, 'webhook']);

<?php
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\HomeController;
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

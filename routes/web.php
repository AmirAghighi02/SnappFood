<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\salesman\PartyController;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::middleware('role:admin,sales')->get('/parties',[PartyController::class,'index'])->name('parties');

Route::post('/login', [AuthController::class, 'loginSubmit'])->name('login.submit');
Route::post('/register', [AuthController::class, 'registerStore'])->name('register.store');
Route::middleware(['auth'])->post('/logout',[AuthController::class,'logout'])->name('logout');

require_once 'admin/web.php';
require_once 'salesman/web.php';

Route::get('/test',function (){
    return view('test');

})->name('test');

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::middleware(['auth','web'])->group(function () {

   Route::any('/addDeposit',[HomeController::class, 'addDeposit']);
   Route::any('/addWithdraw',[HomeController::class, 'addWithdraw']);
   Route::any('/addTransfer',[HomeController::class, 'addTransfer']);
   Route::get('/statement',[HomeController::class, 'statement']);
   
   
   


});

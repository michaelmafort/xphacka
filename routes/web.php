<?php

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/balance', [\App\Http\Controllers\BankController::class, 'myBalance']);
Route::get('/credit-card', [\App\Http\Controllers\BankController::class, 'creditCardTransactions']);
Route::get('/investiments', [\App\Http\Controllers\BankController::class, 'investiments']);
Route::get('/checking-account', [\App\Http\Controllers\BankController::class, 'checkingAccount']);

require __DIR__.'/auth.php';

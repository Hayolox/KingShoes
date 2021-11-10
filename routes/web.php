<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\IdentitiesController;
use App\Http\Controllers\Admin\TransactionController;
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

Route::prefix('Secret')->group(function(){
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
        Route::resource('Identities', IdentitiesController::class);

        Route::get('Transaction/{id}', [TransactionController::class, 'create'])->name('transaction');
        Route::post('Transaction/Proses/{id}', [TransactionController::class, 'proses'])->name('transaction-proses');
        Route::get('Transaction/status/{id}', [TransactionController::class, 'status'])->name('transaction-status');
        Route::delete('Transaction/delete/{id}', [TransactionController::class, 'delete'])->name('transaction-delete');

});

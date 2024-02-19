<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccountController as A;
use App\Http\Controllers\ClientController as C;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('clients')->name('clients-')->group(function () {
    Route::get('/', [C::class, 'index'])->name('index');
    Route::get('/create', [C::class, 'create'])->name('create');
    Route::post('/', [C::class, 'store'])->name('store');
    Route::get('/{client}', [C::class, 'show'])->name('show');
    Route::get('/{client}/edit', [C::class, 'edit'])->name('edit');
    Route::put('/{client}', [C::class, 'update'])->name('update');
    Route::get('/{client}/delete', [C::class, 'delete'])->name('delete');
    Route::delete('/{client}', [C::class, 'destroy'])->name('destroy');
});

Route::prefix('accounts')->name('accounts-')->group(function () {
    Route::get('/', [A::class, 'index'])->name('index');
    Route::get('/create', [A::class, 'create'])->name('create');
    Route::post('/', [A::class, 'store'])->name('store');
    Route::put('/taxes', [A::class, 'taxes'])->name('taxes');
    Route::get('/transfer', [A::class, 'transfer'])->name('transfer');
    Route::put('/transfer', [A::class, 'transferUpdate'])->name('transfer');
    Route::get('/{account}/delete', [A::class, 'delete'])->name('delete');
    Route::get('/{account}/{action}/editAmount', [A::class, 'editAmount'])->name('editAmount');
    Route::put('/{account}/{action}/amountUpdate', [A::class, 'amountUpdate'])->name('amountUpdate');
    Route::delete('/{account}', [A::class, 'destroy'])->name('destroy');
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

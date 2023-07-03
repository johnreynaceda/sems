<?php

use App\Http\Controllers\ProfileController;
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
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/management', function () {
    return view('pages.management');
})->middleware(['auth', 'verified'])->name('management');

//account
Route::get('/account', function () {
    return view('pages.account');
})->middleware(['auth', 'verified'])->name('account');

//sales
Route::get('/management/sales-transaction', function () {
    return view('pages.sales-transaction');
})->middleware(['auth', 'verified'])->name('sales-transaction');
Route::get('/management/sales-category', function () {
    return view('pages.sales-category');
})->middleware(['auth', 'verified'])->name('sales-category');

//expense
Route::get('/management/expenses-transaction', function () {
    return view('pages.expenses-transaction');
})->middleware(['auth', 'verified'])->name('expenses-transaction');
Route::get('/management/expenses-category', function () {
    return view('pages.expenses-category');
})->middleware(['auth', 'verified'])->name('expenses-category');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
<?php

use App\Http\Controllers\Controller;
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

// Redirect to the home page
Route::redirect('/', 'home');

// Route to home with get
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);
Route::resource('home', \App\Http\Controllers\HomeController::class);
Route::resource('kennisbank', \App\Http\Controllers\SupportController::class);

// When the user is logged in and has a verified email address, he can access all this routes
Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('dashboard', \App\Http\Controllers\DashboardController::class);
    Route::resource('transactions', \App\Http\Controllers\TransactionController::class);
    Route::resource('categorie', \App\Http\Controllers\CategoryController::class);
    Route::resource('uitgaven', \App\Http\Controllers\ExpenseController::class);
    Route::resource('inkomen', \App\Http\Controllers\IncomeController::class);
    Route::resource('mijn-muntenharker', App\Http\Controllers\MijnMuntenharkerController::class);
    Route::resource('spaardoelen', \App\Http\Controllers\SpaardoelController::class);
    Route::resource('adminpanel', \App\Http\Controllers\AdminPanelController::class);
});

// Require /auth routes
require __DIR__.'/auth.php';

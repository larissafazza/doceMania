<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
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

// Auth::routes();
// Route::get('/', function () {
//     return view('auth.login');
// });

Route::resource('products', ProductController::class);
    // ->middleware('auth');
    // ->except(['edit', 'update', 'destroy']);

Route::resource('reports', ReportController::class);
    // ->middleware('auth');

Route::resource('sales', SaleController::class);
    // ->middleware('auth');

Route::resource('suppliers', SupplierController::class);
    // ->middleware('auth');

// Route::put('todos/{id}/mark-as-done', [TodoController::class, 'markAsDone'])
//     ->name('todos.markAsDone')
//     ->middleware('auth');


// Route::get('/home', [HomeController::class, 'index'])
//     ->name('home')
//     ->middleware('auth');

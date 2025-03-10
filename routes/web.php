<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\SupplierController;
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

Route::resource('products', ProductController::class)
->middleware('auth');

Route::get('/report/missing', [ReportController::class, 'missing'])->name('reports.missing');
Route::get('/report/missing/export-pdf', [ReportController::class, 'exportPdf'])->name('report.missing.export');
Route::get('/report/invoicing', [ReportController::class, 'invoicing'])->name('reports.invoicing');
Route::get('/report/missing/invoicing-pdf', [ReportController::class, 'exportInvoicingPdf'])->name('report.invoicing.export');
Route::get('/report/expiration', [ReportController::class, 'expiration'])->name('reports.expiration');
Route::resource('sales', SaleController::class)
->middleware('auth');

Route::resource('suppliers', SupplierController::class)
->middleware('auth');

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

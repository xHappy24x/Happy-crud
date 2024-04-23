<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\QuotationController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PdfController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('quotations/{id}/pdf', [PdfController::class, 'generatePdf'])->name('quotation.pdf');

Route::controller(AuthController::class)->group(function () {
    Route::get('register', 'register')->name('register');
    Route::post('register', 'registerSave')->name('register.save');
  
    Route::get('login', 'login')->name('login');
    Route::post('login', 'loginAction')->name('login.action');
  
    Route::get('logout', 'logout')->middleware('auth')->name('logout');
});

Route::controller(ClientController::class)->prefix('clients')->group(function ()
{
    Route::get('', 'indexc')->name('clients');
    Route::get('searchc', 'searchc')->name('clients.searchc');
    Route::get('createc', 'createc')->name('clients.createc');
    Route::post('storec', 'storec')->name('clients.storec');
    Route::get('showc/{id}', 'showc')->name('clients.showc');
    Route::get('editc/{id}', 'editc')->name('clients.editc');
    Route::put('editc/{id}', 'updatec')->name('clients.updatec');
    Route::delete('destroy/{id}', 'destroyc')->name('clients.destroyc');

});

Route::controller(QuotationController::class)->prefix('quotations')->group(function ()
{
    Route::get('', 'indexq')->name('quotations');
    Route::get('searchq', 'searchq')->name('quotations.searchq');
    Route::get('createq', 'createq')->name('quotations.createq');
    Route::post('storeq', 'storeq')->name('quotations.storeq');
    Route::get('showq/{id}', 'showq')->name('quotations.showq');
    Route::get('view/{id}', 'view')->name('quotations.view');
    Route::get('generate/{id}', 'generate')->name('quotations.generate');
    Route::get('editq/{id}', 'editq')->name('quotations.editq');
    // Route::get('details/{id}', 'details')->name('quotations.details');
    Route::put('editq/{id}', 'updateq')->name('quotations.updateq');
    Route::delete('destroy/{id}', 'destroyq')->name('quotations.destroyq');

});

Route::controller(ProductController::class)->prefix('products')->group(function () {
    Route::get('', 'index')->name('products');
    Route::get('create', 'create')->name('products.create');
    Route::post('store', 'store')->name('products.store');
    Route::get('show/{id}', 'show')->name('products.show');
    Route::get('edit/{id}', 'edit')->name('products.edit');
    Route::put('edit/{id}', 'update')->name('products.update');
    Route::delete('destroy/{id}', 'destroy')->name('products.destroy');
});

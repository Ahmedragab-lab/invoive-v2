<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\Http\Controllers;
Route::get('/', function () {
    return view('welcome');
});



Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ], function(){
        Auth::routes();
        Route::get('/home', [Controllers\HomeController::class, 'index'])->name('home');
        // sectionss
        Route::resource('sections',Controllers\SectionController::class);
        // products
        Route::resource('products', Controllers\ProductController::class);
        // invoices
        Route::get('/product/{section_id}', [Controllers\InvoiceController::class, 'getProduct']);
        Route::get('/price/{product_id}', [Controllers\InvoiceController::class, 'getPrice']);
        Route::resource('invoices', Controllers\InvoiceController::class);
        Route::resource('/invoicesdetails/{id}', Controllers\InvoicesDetailsController::class);





        Route::group(['middleware' => ['auth']], function() {
           Route::resource('users',Controllers\UserController::class);
           Route::resource('roles',Controllers\RoleController::class);


        });
    });

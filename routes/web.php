<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Users\HomeController;


Route::get('login',[AuthController::class, 'login'])->name('login');
Route::post('login',[AuthController::class, 'postLogin'])->name('postLogin');
Route::get('logout',[AuthController::class, 'logout'])->name('logout');
Route::get('register',[AuthController::class, 'register'])->name('register');
Route::post('register',[AuthController::class, 'postRegister'])->name('postRegister');




Route::group([
    'prefix' => 'admin',
    'as' => 'admin.',
    'middleware' => 'checkAdmin',
],function(){

    Route::group([
        'prefix' => 'product',
        'as' => 'product.'
    ],function(){
       Route::get('/',[ProductController::class,'listProduct'])->name('listProduct');
       Route::get('addProduct',[ProductController::class,'addProduct'])->name('addProduct');
       Route::get('addProduct', [ProductController::class, 'showAddProductForm'])->name('addProduct');
    //    Route::get('showAddProductForm',[ProductController::class,'showAddProductForm'])->name('showAddProductForm');
       Route::post('addProduct',[ProductController::class,'addPostProduct'])->name('addPostProduct');

       Route::delete('delete/{id}',[ProductController::class,'deleteProduct'])->name('deleteProduct');

       Route::get('detail-Product/{idProduct}',[ProductController::class,'detailProduct'])->name('detailProduct');

       Route::get('update-Product/{idProduct}',[ProductController::class,'updateProduct'])->name('updateProduct');
       Route::patch('update-Product/{idProduct}',[ProductController::class,'updatePatchProduct'])->name('updatePatchProduct');
    });

});

Route::group([
   'prefix' => 'users',
   'as' => 'users.',
],function(){
    Route::get('/',[HomeController::class,'listUsers'])->name('listUsers');

});
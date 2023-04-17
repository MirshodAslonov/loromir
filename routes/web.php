<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProjectController;

Route::get('/', function () {  return view('login.login');  })->name('loginn');
Route::get('signIn', function () { return view('login.signIn'); })->name('signIn');

Route::post('login', [AuthController::class, 'login'])->name('login');
Route::post('register',[AuthController::class,'register'])->name('register');

Route::group(['middleware' => ["auth:web"]], function () {
    Route::group(['prefix' => 'page'], function () {
        Route::get('create',[ProjectController::class,'createPage'])->name('createPage')->middleware('isAdmin:web');
        Route::get('list/{id}',[ProjectController::class,'listPage'])->name('listPage');
    }); 
    
    Route::get('list/{id}',[ProjectController::class,'list'])->name('list');
    Route::post('create',[ProjectController::class,'create'])->name('create')->middleware('isAdmin:web');
    Route::post('answer/{id}',[ProjectController::class,'answer'])->name('answer');
    Route::get('welcome', function () { return view('layouts.welcome'); })->name('welcome');
    

 










    Route::get('/logout',[AuthController::class,'logout'])->name('logout');
 });
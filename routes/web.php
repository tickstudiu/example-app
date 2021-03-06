<?php

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

use App\Http\Controllers\ContactController;
use App\Http\Controllers\InquiryController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\UserAuthController;

//Route::get('/contact', [ContactController::class, 'index']);
//Route::post('/contact', [ContactController::class, 'store']);

// path web
Route::get('/inquiry/read', [PagesController::class, 'inquiryRead']);
Route::get('/inquiry/create', [PagesController::class, 'inquiryCreate']);
Route::get('/inquiry/update', [PagesController::class, 'inquiryUpdate']);
Route::get('/login', [PagesController::class, 'login']);
Route::get('/logout', [UserAuthController::class, 'logout']);

// path action
Route::post('/api/inquiry', [InquiryController::class, 'store']);
Route::put('/api/inquiry', [InquiryController::class, 'change']);
Route::delete('/api/inquiry', [InquiryController::class, 'remove']);
Route::post('/api/user/auth', [UserAuthController::class, 'login']);

// 404 path
Route::get('/{any}', 'App\Http\Controllers\PagesController@index')->where('any', '.*');

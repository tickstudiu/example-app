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

Route::get('/contact', [ContactController::class, 'index']);
Route::post('/contact', [ContactController::class, 'store']);
Route::get('/inquiry/read', [PagesController::class, 'inquiryRead']);
Route::get('/inquiry/create', [PagesController::class, 'inquiryCreate']);
Route::post('/inquiry/create', [InquiryController::class, 'store']);
Route::get('/{any}', 'App\Http\Controllers\PagesController@index')->where('any', '.*');

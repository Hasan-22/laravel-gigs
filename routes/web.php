<?php

use App\Http\Controllers\ListingsController;
use App\Http\Controllers\UserController;
use App\Models\Listing;
use Illuminate\Http\Request;
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

//  get all listings route
Route::get('/', [ListingsController::class, 'index']);

// show create form
Route::get('/listing/create', [ListingsController::class, 'create'])->middleware('auth');

// store create form
Route::post('/listings', [ListingsController::class, 'store'])->middleware('auth');

// show edit form
Route::get('/listing/{listing}/edit', [ListingsController::class, 'edit'])->middleware('auth');

// update edit form
Route::put('/listing/{listing}', [ListingsController::class, 'update'])->middleware('auth');

// delete route
Route::delete('/listing/{listing}', [ListingsController::class, 'destroy'])->middleware('auth');

// get single listing
Route::get('/listing/{listing}', [ListingsController::class, 'showSingle']);

// show register form
Route::get('/register', [UserController::class, 'create'])->middleware('guest');

// store user
Route::post('/user', [UserController::class, 'store']);

// logout user
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');

// show login form
Route::get('/login', [UserController::class, 'login'])
    ->name('login')
    ->middleware('guest');

// login authenticate
Route::post('/user/authenticate', [UserController::class, 'authenticate']);

// manage listing route
Route::get('/listings/manage', [ListingsController::class, 'manage'])->middleware('auth');

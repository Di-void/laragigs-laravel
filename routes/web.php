<?php

use App\Http\Controllers\ListingController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use \Illuminate\Http\Request;

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

// Show all listings
Route::get('/', [ListingController::class, 'index']);

// Show Create Form
Route::get('/listings/create', [ListingController::class, 'create'])->middleware('auth');

// Store Listing data
Route::post('/listings', [ListingController::class, 'store'])->middleware('auth');

// Show Edit Form
Route::get('/listings/{listing}/edit', [ListingController::class, 'edit'])->middleware('auth');

// Update Listing
Route::put('/listings/{listing}', [LIstingController::class, 'update'])->middleware('auth');

// Delete Listing
Route::delete('/listings/{listing}', [LIstingController::class, 'destroy'])->middleware('auth');

// Manage Listings
Route::get('/listings/manage', [ListingController::class, 'manage'])->middleware('auth');

// Show single listing
Route::get('/listings/{listing}', [ListingController::class, 'show']);

// Show Register/Create
Route::get('/register', [UserController::class, 'create'])->middleware('guest');

// Create New User
Route::post('/users', [UserController::class, 'store']);

// Log user out
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');

// Show Login Form
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');

// Login user
Route::post('/users/authenticate', [UserController::class, 'authenticate']);

<?php
use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ListingController;

// Home page
Route::get('/', [ListingController::class, 'index']);

// LISTING CONTROLLERS

// All listings
Route::get('/listings', [ListingController::class, 'index']);

// Create listing
Route::get('/listings/create', [ListingController::class, 'showCreate'])->middleware('auth');

// Store listing data
Route::post('/listings', [ListingController::class, 'store']);

// Manage listings
Route::get('/listings/manage', [ListingController::class, 'manage'])->middleware('auth');

// Edit listing data
Route::get('/listings/{listing}/edit', [ListingController::class, 'edit'])->middleware('auth');

// Update listing data
Route::put('/listings/{listing}', [ListingController::class, 'update'])->middleware('auth');

// Delete listing data
Route::delete('/listings/{listing}', [ListingController::class, 'destroy'])->middleware('auth');

// Single listing
Route::get('/listings/{listing}', [ListingController::class, 'show']);

// USER CONTROLLERS

// Show Register/Create Form
Route::get('/register', [UserController::class, 'create'])->middleware('guest');

// Create new user
Route::post('/users', [UserController::class, 'store'])->middleware('guest');

// Show login form
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');

// Log user out
Route::post('/authenticate', [UserController::class, 'authenticate'])->middleware('guest');

// Log user out
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');
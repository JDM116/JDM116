<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TuningCardController;
use App\Http\Controllers\RegController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\MapController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentsController;


Route::get('/map', [MapController::class, 'show']);


Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
Route::post('/cart/remove', [CartController::class, 'remove'])->name('cart.remove');


Route::get("/", [TuningCardController::class, "wheels"])->name("wheels");
Route::get("/tunings", [TuningCardController::class, "index"])->name("tunings.index");
Route::get("/tunings/{id}", [TuningCardController::class, "more"])->name('tunings.more');
Route::post("/tunings/{id}", [TuningCardController::class, "share"])->name('comments.share');

Route::middleware(['auth'])->group(function () {
    Route::get("/admin", [TuningCardController::class, "show"])->name('admin.dashboard');
    Route::post("/admin/add", [TuningCardController::class, "create"])->name("tunings.add");
    Route::post('/admin/remove', [TuningCardController::class, 'remove'])->name('admin.remove');
    Route::post('/admin/update', [TuningCardController::class, 'update'])->name('admin.update');
    Route::get('/admin/search', [TuningCardController::class, 'search'])->name('admin.search');
});



Route::get('/register', [AuthController::class, 'register']);
Route::post('/register', [AuthController::class, 'register']);
Route::get('/login', [TuningCardController::class, "wheels"]);
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/profile', [TuningCardController::class, 'profile'])->name('profile');
Route::get('/tunings/{id}/com', [TuningCardController::class, 'view'])->name('idnex');
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TuningCardController;
use App\Http\Controllers\RegController;



Route::get("/", [TuningCardController::class, "wheels"])->name("wheels");
Route::get("/tunings", [TuningCardController::class, "index"])->name("tunings.index");
Route::get("/admin", [TuningCardController::class, "show"])->name("tunings.show");
Route::post("/admin/add", [TuningCardController::class, "create"])->name("tunings.add");
Route::post('/admin/remove', [TuningCardController::class, 'remove'])->name('admin.remove');
Route::post('/admin/update', [TuningCardController::class, 'update'])->name('admin.update');
Route::get('/admin/search', [TuningCardController::class, 'search'])->name('admin.search');
Route::post("/reg", [TuningCardController::class, "register"]);
Route::get("/reg", [TuningCardController::class, "register"]);


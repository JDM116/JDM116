<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TuningCardController;


Route::get('/', function () {
    return view('index');
});
Route::get("/", [TuningCardController::class, "wheels"])->name("wheels");
Route::get("/tunings", [TuningCardController::class, "index"])->name("tunings.index");
Route::get("/admin", [TuningCardController::class, "show"])->name("tunings.show");
Route::post("/admin/add", [TuningCardController::class, "create"])->name("tunings.add");

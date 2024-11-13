<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TuningCardController;

Route::get("/tunings", [TuningCardController::class, "index"])->name("tunings.index");

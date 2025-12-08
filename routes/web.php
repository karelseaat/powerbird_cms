<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

Route::get('/', function () {
    return response()->json(['app' => 'CMS Application']);
});

Route::apiResource('pages', PageController::class);
Route::get('/pages/published', [PageController::class, 'published']);

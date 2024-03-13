<?php

use App\Http\Controllers\api\ShowImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::prefix('/image')->group(function () {
    Route::get('/', [ShowImage::class, 'index']);
    Route::get('/{id}', [ShowImage::class, 'find']);
});

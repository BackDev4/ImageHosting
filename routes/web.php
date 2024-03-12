<?php

use App\Http\Controllers\UploadImageController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::post('/', [UploadImageController::class, 'create'])->name("create");

Route::get('/image', [UploadImageController::class, 'index'])->name("all-image");

Route::get('/images/{id}/download', [UploadImageController::class, 'downloadImage'])->name('download-image');

Route::get('/images/{id}', [UploadImageController::class, 'show'])->name('show-image');

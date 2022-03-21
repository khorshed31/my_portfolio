<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ViewController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\AboutController;
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

Route::get('/', [ViewController::class, 'index'])->name('home');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', [AuthController::class, 'index'])->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->get('/add-banner', [BannerController::class, 'index'])->name('add-banner');
Route::middleware(['auth:sanctum', 'verified'])->post('/new-banner', [BannerController::class, 'create'])->name('new-banner');
Route::middleware(['auth:sanctum', 'verified'])->get('/manage-banner', [BannerController::class, 'manage'])->name('manage-banner');
Route::middleware(['auth:sanctum', 'verified'])->get('/edit-banner/{id}', [BannerController::class, 'edit'])->name('edit-banner');
Route::middleware(['auth:sanctum', 'verified'])->post('/update-banner/{id}', [BannerController::class, 'update'])->name('update-banner');

Route::middleware(['auth:sanctum', 'verified'])->get('/add-about', [AboutController::class, 'index'])->name('add-about');
Route::middleware(['auth:sanctum', 'verified'])->get('/manage-about', [AboutController::class, 'manage'])->name('manage-about');
Route::middleware(['auth:sanctum', 'verified'])->post('/new-about', [AboutController::class, 'create'])->name('new-about');
Route::middleware(['auth:sanctum', 'verified'])->get('/edit-about/{id}', [AboutController::class, 'edit'])->name('edit-about');
Route::middleware(['auth:sanctum', 'verified'])->post('/update-about/{id}', [AboutController::class, 'update'])->name('update-about');
Route::middleware(['auth:sanctum', 'verified'])->get('/delete-about/{id}', [AboutController::class, 'delete'])->name('delete-about');

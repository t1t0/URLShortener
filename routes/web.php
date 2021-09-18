<?php

use App\Http\Controllers\ShortlinkController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [ShortlinkController::class, 'index'])->name('home');

Route::get('/tops', [ShortlinkController::class, 'topVisited'])->name('topUrls');

Route::get('/{code}', [ShortlinkController::class, 'show'])->name('shortLink.show');

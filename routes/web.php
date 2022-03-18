<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UrlController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [UrlController::class, 'index'])->middleware(['auth'])->name('dashboard');


Route::get('/url/shorten', [UrlController::class, 'store'])->middleware(['auth'])->name('url.store');

Route::post('/api/shorten', [UrlController::class, 'storeApi'])->name('url.api');

Route::get('/{slug}', [UrlController::class, 'direct'])->middleware(['auth'])->name('url.direct');



require __DIR__.'/auth.php';

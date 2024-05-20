<?php

use App\Http\Controllers;
use App\Models\Page;
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

Route::get('/', Controllers\HomeController::class);

//Pages routes
foreach (Page::getRouteList() as $route) {
    if ($route == 'contact-us') {
        Route::get($route, Controllers\ContactController::class);
        Route::post($route, [Controllers\ContactController::class, 'send']);
    } elseif ($route == 'gallery') {
        Route::get($route, Controllers\GalleryController::class);
    } else {
        Route::get($route, Controllers\PageController::class);
    }
}

Route::get('/thank-you', Controllers\ThankYouController::class)->name('thank-you');

Route::get('/reservation', Controllers\ReservationController::class)
    ->name('reservation');
Route::post('/reservation', Controllers\ThankYouController::class);
Route::get('/blogs/{slug}', Controllers\BlogController::class);

<?php
use App\Http\Controllers\BookingController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/classes', [BookingController::class, 'showAvailableClasses'])->name('classes');
Route::get('/book', [BookingController::class, 'showBookForm'])->name('showBookForm');
Route::post('/book', [BookingController::class, 'bookClass'])->name('book');
Route::get('/cancel', [BookingController::class, 'showCancelForm'])->name('showCancelForm');
Route::post('/cancel', [BookingController::class, 'cancelBooking'])->name('cancel');

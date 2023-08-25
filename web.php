<?php

use App\Http\Controllers\DriversignupController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\VehicledescController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SeevehicleController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\EsewaController;
use App\Http\Controllers\RentvehicleController;
use App\Http\Controllers\GetrentController;
use App\Http\Controllers\EdittransController;




use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/driversignup', [DriversignupController::class, 'driversignup'])->name('driversignup');
Route::post('/createdriver', [DriversignupController::class, 'createdriver'])->name('createdriver');
Route::get('/about', [AboutController::class, 'about'])->name('about');
Route::get('/vehicle', [VehicleController::class, 'vehicle'])->name('vehicle');
Route::get('/vehicledesc', [VehicledescController::class, 'vehicledesc'])->name('vehicledesc');
Route::post('/vehicledesc/{id}', [VehicledescController::class, 'vehicledesc'])->name('vehicledesc');

Route::post('/search', [SearchController::class, 'search'])->name('search');
Route::get('/service', [ServiceController::class, 'service'])->name('service');
Route::get('/booking', [BookingController::class, 'booking'])->name('booking');
Route::post('/vehicledescs/{id}', [VehicledescController::class, 'vehicledescs'])->middleware('auth')->name('vehicledescs');
Route::get('/contact', [ContactController::class, 'contact'])->name('contact');
Route::post('/enquirycontact', [ContactController::class, 'enquirycontact'])->name('enquirycontact');
Route::post('/bookings/{id}', [BookingController::class, 'bookings'])->name('bookings');
Route::post('/deletebooking/{id}', [BookingController::class, 'deletebooking'])->name('deletebooking');
Route::get('/seevehicle/{id}', [SeevehicleController::class, 'seevehicle'])->name('seevehicle');
Route::get('/chart', [ChartController::class, 'barchart'])->name('barchart');
Route::get('/rentvehicle', [RentvehicleController::class, 'rentvehicle'])->name('rentvehicle');
Route::post('/getrent', [GetrentController::class, 'getrent'])->name('getrent');
Route::post('/edittrans/{id}', [EdittransController::class, 'edittrans'])->name('edittrans');

Route::post('/esewa/{id}', [EsewaController::class, 'esewa'])->name('esewa');
Route::post('/esewaRe/{id}', [EsewaController::class, 'esewaRe'])->name('esewaRe');
Route::get('/success', [EsewaController::class, 'esewasuccess'])->name('esewasuccess');
Route::get('/failure', [EsewaController::class, 'esewafailure'])->name('esewafailure');











Route::get('/dashboard', function () {
    return redirect('/');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

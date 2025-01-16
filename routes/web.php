<?php

use App\Http\Controllers\FlightController;
use App\Http\Controllers\BookingController;
use APP\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

//Route::get('/', [HomeController::class,'index']); 
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Route::get('flight',[FlightController::class,'index'])->name('flight.index');
Route::get('flight', [App\Http\Controllers\FlightController::class, 'index'])->name('flight.index');
Route::get('flight/{flight_number}/choose-tier', [App\Http\Controllers\FlightController::class, 'show'])->name('flight.show');


Route::get('flight/booking/{flight_number}', [App\Http\Controllers\BookingController::class, 'booking'])->name('booking');

Route::get('flight/booking/{flight_number}/choose-seat', [App\Http\Controllers\BookingController::class, 'chooseseat'])->name('booking.chooseseat');

Route::get('check_booking', [App\Http\Controllers\BookingController::class, 'checkBooking'])->name('booking.check');



//Route::get('flight', [HomeController::class, 'index'])->name('flight.index');
// Route::get('/', function(){
//     return view('welcome');
// });
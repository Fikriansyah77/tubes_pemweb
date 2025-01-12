<?php
use App\Http\Controllers\FlightController;
use APP\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class,'index']); 
Route::get('flight',[FlightController::class,'index'])->name('flight.index');
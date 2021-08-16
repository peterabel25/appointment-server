<?php

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\MidwifeController;
use App\Http\Controllers\MotherController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Routing\Route as RoutingRoute;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
 
// Routes Appointment

Route::get('appointments', [ AppointmentController::class,'getAppointments']);

Route::post('appointment',[AppointmentController::class,'postAppointment']);

Route::get('appointment/{appointmentId}', [ AppointmentController::class,'getAppointment']);

Route::delete('appointment/{appointmentId}', [ AppointmentController::class,'deleteAppointment']);

Route::put('appointment/{appointmentId}',[AppointmentController::class,'putAppointment']);




//Routes midwife 

Route::get('midwives', [ MidwifeController::class,'getMidwives']);

Route::post('midwife',[MidwifeController::class,'postMidwife']);


Route::get('midwife/{midwifeId}', [ MidwifeController::class,'getMidwife']);

Route::delete('midwife/{midwifeId}', [ MidwifeController::class,'deleteMidwife']);

Route::put('midwife/{midwifeId}',[MidwifeController::class,'putMidwife']);


//Routes Mother

Route::get('mothers', [ MotherController::class,'getMothers']);

Route::post('mother',[MotherController::class,'postMother']);

Route::get('mother/{motherId}', [ MotherController::class,'getMother']);

Route::delete('mother/{motherId}', [ MotherController::class,'deleteMother']);

Route::put('mother/{motherId}',[MotherController::class,'putMother']);


//Routes Payment

Route::get('payments', [ PaymentController::class,'getPayments']);

Route::post('payment',[PaymentController::class,'postPayment']);

Route::get('payment/{paymentId}', [ PaymentController::class,'getPayment']);

Route::delete('payment/{paymentId}', [ PaymentController::class,'deletePayment']);

Route::put('payment/{paymentId}',[PaymentController::class,'putPayment']);




//Routes User

Route::get('users', [ UserController::class,'getUsers']);

Route::post('user',[UserController::class,'postUser']);

Route::post('register',[UserController::class,'register']);

Route::get('user/{userId}', [ UserController::class,'getUser']);

Route::delete('user/{userId}', [ UserController::class,'deleteUser']);

Route::put('user/{userId}',[UserController::class,'putUser']);


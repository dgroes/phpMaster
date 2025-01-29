<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReservationController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//Ruta de usuarios
Route::resource('usuarios', UserController::class);

Route::get('reservations/pagos', [ReservationController::class, 'showPayments'])->name('reservations.pagos');

//Ruta de calendar
Route::get('reservations.calendar', function () {
    return view('reservations.calendar');
})->name('reservations.calendar');

Route::get('adminstrador/fullcalendar', [ReservationController::class, 'getAllReservations'])->name('administrador.fullcalendar');

//Ruta de reservaciones
Route::resource('reservations', ReservationController::class);
Route::post('reservation.cancel', [ReservationController::class, 'cancel'])->name('reservations.cancel');


//Ruta de Asesor (consultor)
Route::get('consultant.calendar', function () {
    return view('consultant.calendar');
})->name('consultant.calendar');

Route::get('consultant/fullcalendar', [ReservationController::class, 'getAllReservationsByConsultant'])->name('consultant.fullcalendar');

Route::get('client/payments', [ReservationController::class, 'showClientPayments'])->name('client.payments');

//Ruta de Cliente (usuario normal)
Route::get('client.calendar', function () {
    return view('client.calendar');
})->name('client.calendar');
Route::get('client/fullcalendar',[ReservationController::class,'getAllReservationsByClient'])->name('client.fullcalendar');
Route::get('client/reservations', [ReservationController::class, 'indexClient'])->name('client.reservations');
Route::get('client/reservation', [ReservationController::class, 'createClient'])->name('client.reservation');





Route::post('client.cancel', [ReservationController::class, 'cancel'])->name('reservations.cancel');


Route::post('/paypal',[ReservationController::class,'completePayment']);

Route::get('welcome/fullcalendar',[ReservationController::class,'getAllReservationsLanding'])->name('welcome.fullcalendar');
require __DIR__ . '/auth.php';

<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\User;
use Illuminate\Http\Request;

class ReservationController extends Controller
{

    public function index()
    {
        $reservations = Reservation::with(['user', 'consultant'])->get();
        return view('reservations.index', compact('reservations'));
    }

    public function create()
    {
        // Llamar a los usuarios que tengan el rol de 'usuario' y que no estén eliminados
        $users = User::where('rol_id', 3)->whereNull('deleted_at')->get();

        // Llamar a los usuarios que tengan el rol de 'consultores' y que no estén eliminados
        $consultans = User::where('rol_id', 2)->whereNull('deleted_at')->get();

        return view('reservations.create', compact('users', 'consultans'));
    }


    public function store(Request $request)
    {
        //Validar los datos antes de guardarlos
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'consultant_id' => 'required|exists:users,id',
            'reservation_date' => 'required|date',
            'star_time' => 'required|date_format:H:i|after_or_equal:09:00|before_or_equal:16:00', // Formato de 24 horas
            'end_time' => 'required|date_format:H:i|before_or_equal:16:00',
            'reservation_status' => 'required|in:pendiente,completada,cancelada',
            'total_amount' => 'required|numeric|min:0',
            'payment_status' => 'required|in:pendiente,pagado,fallido',
        ]);

        $reservation = Reservation::crate([
            'user_id' => $request->user_id,
            'consultant_id' => $request->consultant_id,
            'reservation_date' => $request->reservation_date,
            'star_time' => $request->star_time,
            'end_time' => $request->end_time,
            'reservation_status' => $request->reservation_status,
            'total_amount' => $request->total_amount,
            'payment_status' => $request->payment_status,
        ]);

        return redirect()->route('reservations.index')->with('success', '¡Reservación creada con éxito!');
    }


    public function show(string $id)
    {
        //
    }


    public function edit(string $id)
    {
        //
    }


    public function update(Request $request, string $id)
    {
        //
    }


    public function destroy(string $id)
    {
        //
    }
}

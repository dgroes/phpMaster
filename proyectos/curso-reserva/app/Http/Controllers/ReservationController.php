<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\User;
use Carbon\Carbon;
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
        $consultants = User::where('rol_id', 2)->whereNull('deleted_at')->get();

        return view('reservations.create', compact('users', 'consultants'));
    }

    public function store(Request $request)
    {
        //Validar los datos antes de guardarlos
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'consultant_id' => 'required|exists:users,id',
            'reservation_date' => 'required|date',
            'start_time' => 'required|date_format:H:i|after_or_equal:09:00|before_or_equal:15:00',
            'end_time' => 'required|date_format:H:i|before_or_equal:15:00',
            'reservation_status' => 'required|in:pendiente,confirmada,cancelada',
            'payment_status' => 'required|in:pendiente,pagado,fallido',
            'total_amount' => 'required|numeric|min:0',
        ]);
        // dd($request->all());

        // Creación de la reserva
        $reservation = Reservation::create([
            'user_id' => $request->user_id,
            'consultant_id' => $request->consultant_id,
            'reservation_date' => $request->reservation_date,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
            'reservation_status' => $request->reservation_status,
            'payment_status' => $request->payment_status,
            'total_amount' => $request->total_amount,
        ]);

        return redirect()->route('reservations.index')->with('success', '¡Reservación creada con éxito!');
    }

    public function edit(string $id)
    {
        $reservation = Reservation::findOrFail($id); // Verificar si la reserva existe
        $reservation->star_time = Carbon::parse($reservation->start_time)->format('H:i'); // Formatear la hora de inicio
        $reservation->end_time = Carbon::parse($reservation->end_time)->format('H:i'); // Formatear la hora de fin

        // Llamar a los usuarios que tengan el rol de 'usuario' y que no estén eliminados
        $users = User::where('rol_id', 3)->whereNull('deleted_at')->get();

        // Llamar a los usuarios que tengan el rol de 'consultores' y que no estén eliminados
        $consultants = User::where('rol_id', 2)->whereNull('deleted_at')->get();

        return view('reservations.edit', compact('reservation', 'users', 'consultants'));
    }

    public function update(Request $request, string $id)
    {
        //Validar los datos antes de guardarlo
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'consultant_id' => 'required|exists:users,id',
            'reservation_date' => 'required|date',
            'start_time' => 'required|date_format:H:i|after_or_equal:09:00|before_or_equal:15:00',
            'end_time' => 'required|date_format:H:i|before_or_equal:15:00',
            'reservation_status' => 'required|in:pendiente,confirmada,cancelada',
            'payment_status' => 'required|in:pendiente,pagado,fallido',
            'total_amount' => 'required|numeric|min:0',
        ]);

        // Buscar la reserva
        $reservation = Reservation::findOrFail($id);

        // Rellenar con los datos validados
        $reservation->fill($validated);

        // Guardar cambios si es necesario
        if ($reservation->isDirty()) {
            $reservation->save();
        }

        return redirect()->route('reservations.index')->with('success', '¡Reservación actualizada con éxito!');
    }

    public function cancel(Request $request)
    {
        // Validación de los datos
        $request->validate([
            'reservation_id' => 'required|exists:reservations,id',
            'cancellation_reason' => 'required|string',
        ]);

        $reservation = Reservation::findOrFail($request->reservation_id);
        $reservation->reservation_status = 'cancelada'; // Cambia el estado a 'cancelada'
        $reservation->cancellation_reason = $request->cancellation_reason;
        $reservation->save();

        return response()->json([
            'success' => true,
            'message' => 'La reserva ha sido cancelada exitosamente',
        ]);
    }

    public function getAllReservations()
    {
        $reservations = Reservation::where('reservarion_status', '!=', 'cancelada')->get();
        $events = [];
        foreach ($reservations as $reservation) {
            $events = [
                'title' => 'Reserva de ' . $reservation->user->nombres . ' ' . $reservation->user->apellidos . ' con ' . $reservation->consultant->nombres . ' ' . $reservation->consultant->apellidos,
                'start' => $reservation->reservation_date . 'T' . $reservation->start_time,
                'end' => $reservation->reservation_date . 'T' . $reservation->end_time,
            ];
        }

        return response()->json($events);
    }
}

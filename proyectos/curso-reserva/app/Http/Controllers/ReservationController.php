<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Reservation;
use App\Models\ReservationDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class ReservationController extends Controller
{

    public function index()
    {
        $reservations = Reservation::with(['user', 'consultant'])->get();
        return view('reservations.index', compact('reservations'));
    }

    public function indexClient()
    {
        $userId = Auth::user()->id;
        $reservations = Reservation::where('user_id', $userId)->get();
        return view('client.index', compact('reservations'));
    }

    public function create()
    {
        // Llamar a los usuarios que tengan el rol de 'usuario' y que no estén eliminados
        $users = User::where('rol_id', 3)->whereNull('deleted_at')->get();

        // Llamar a los usuarios que tengan el rol de 'consultores' y que no estén eliminados
        $consultants = User::where('rol_id', 2)->whereNull('deleted_at')->get();

        return view('reservations.create', compact('users', 'consultants'));
    }

    public function createClient()
    {
        // Llamar a los usuarios que tengan el rol de 'consultores' y que no estén eliminados
        $consultants = User::where('rol_id', 2)->whereNull('deleted_at')->get();

        return view('client.reservation', compact('consultants'));
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
        $reservations = Reservation::all();
        $events = [];
        foreach ($reservations as $reservation) {
            $color = '#28a745';
            $bordercolor = '#28a745';

            if ($reservation->reservation_status === 'pendiente') {
                $color = '#ffc107';
                $bordercolor = '#ffc107';
            } elseif ($reservation->reservation_status === 'cancelada') {
                $color = '#dc3545';
                $bordercolor = '#dc3545';
            }

            $events[] = [
                'title' => 'Reserva con ' . $reservation->user->nombres . ' ' . $reservation->user->apellidos,
                'start' => $reservation->reservation_date . 'T' . $reservation->start_time,
                'end' => $reservation->reservation_date . 'T' . $reservation->end_time,
                'backgroundColor' => $color,
                'borderColor' => $bordercolor,
                // 'reservation_status' => $reservation->reservation_status,
            ];
        }

        return response()->json($events);
    }

    public function getAllReservationsByConsultant()
    {
        $consultantId = Auth::user()->id;

        $reservations = Reservation::where('consultant_id', $consultantId)->get();

        $events = [];
        foreach ($reservations as $reservation) {
            $color = '#28a745';
            $bordercolor = '#28a745';

            if ($reservation->reservation_status === 'pendiente') {
                $color = '#ffc107';
                $bordercolor = '#ffc107';
            } elseif ($reservation->reservation_status === 'cancelada') {
                $color = '#dc3545';
                $bordercolor = '#dc3545';
            }

            $events[] = [
                'title' => 'Reserva con ' . $reservation->user->nombres . ' ' . $reservation->user->apellidos,
                'start' => $reservation->reservation_date . 'T' . $reservation->start_time,
                'end' => $reservation->reservation_date . 'T' . $reservation->end_time,
                'backgroundColor' => $color,
                'borderColor' => $bordercolor,
                // 'reservation_status' => $reservation->reservation_status,
            ];
        }

        return response()->json($events);
    }

    public function getAllReservationsByClient()
    {
        $userId = Auth::user()->id;

        $reservations = Reservation::where('user_id', $userId)->get();

        $events = [];
        foreach ($reservations as $reservation) {
            $color = '#28a745';
            $bordercolor = '#28a745';

            if ($reservation->reservation_status === 'pendiente') {
                $color = '#ffc107';
                $bordercolor = '#ffc107';
            } elseif ($reservation->reservation_status === 'cancelada') {
                $color = '#dc3545';
                $bordercolor = '#dc3545';
            }

            $events[] = [
                'title' => 'Reserva con ' . $reservation->consultant->nombres . ' ' . $reservation->user->apellidos,
                'start' => $reservation->reservation_date . 'T' . $reservation->start_time,
                'end' => $reservation->reservation_date . 'T' . $reservation->end_time,
                'backgroundColor' => $color,
                'borderColor' => $bordercolor,
                // 'reservation_status' => $reservation->reservation_status,
            ];
        }

        return response()->json($events);
    }

    public function completePayment(Request $request)
    {

        $request->validate([
            'orderID' => 'required',
            'details' => 'required',
            'user_id' => 'required|exists:users,id',
            'consultant_id' => 'required|exists:users,id',
            'reservation_date' => 'required|date',
            'start_time' => 'required|date_format:H:i|after_or_equal:09:00|before_or_equal:15:00',
            'end_time' => 'required|date_format:H:i|before_or_equal:15:00',
            'total_amount' => 'required|numeric|min:0',
        ]);

        $details = $request->details;
        $payment_status = $details['status'];

        if ($payment_status === 'COMPLETED') {

            $reservation = Reservation::create([
                'user_id' => $request->user_id,
                'consultant_id' => $request->consultant_id,
                'reservation_date' => $request->reservation_date,
                'start_time' => $request->start_time,
                'end_time' => $request->end_time,
                'reservation_status' => 'confirmada',
                'payment_status' => 'pagado',
                'total_amount' => $request->total_amount,
            ]);

            $transaction_id = $details['id'] ?? null;
            $payer_id = $details['payer']['payer_id'] ?? null;
            $payer_email = $details['payer']['email_address'] ?? null;
            $amount = $details['purchase_units'][0]['amount']['value'] ?? null;

            ReservationDetail::create([
                'reservation_id' => $reservation->id,
                'transaction_id' => $transaction_id,
                'payer_id' =>  $payer_id,
                'payer_email' => $payer_email,
                'payment_status' => $payment_status,
                'amount' => $amount,
                'response_json' => json_encode($details),
            ]);

            $this->sendConfirmationEmail($reservation);

            return response()->json(['success' => true]);
        } else {
            return response()->json(['error' => 'Pago no completado'], 400);
        }
    }

    public function sendConfirmationEmail($reservation)
    {
        $user = User::find($reservation->user_id);
        $consultant = User::find($reservation->consultant_id);

        $mail = new PHPMailer(true);

        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = '@gmail.com';
            $mail->Password = '';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            $mail->setFrom('diegopasten78@gmail.com', 'Nombre Remitente');
            $mail->addAddress($user->email);

            $mail->CharSet = 'UTF8';

            $mail->Subject = 'Confirmación de Reserva - Curso Reserva';

            $html = View::make('emails.reserva', [
                'userName' => $user->nombres . ' ' . $user->apellidos,
                'consultantName' => $consultant->nombres . ' ' . $consultant->apellidos,
                'reservationDate' => $reservation->reservation_date,
                'startTime' => $reservation->start_time,
                'endTime' => $reservation->end_time,
                'totalAmount' => $reservation->total_amount,
            ])->render();

            $mail->isHTML(true);
            $mail->Body = $html;

            $mail->send();

            return back()->with('success', 'Correo enviado correctamente.');
        } catch (Exception $e) {
            Log::error('Error al enviar el correo: ' . $mail->ErrorInfo);
            return back()->with('error', 'Error al enviar el correo :' . $mail->ErrorInfo);
        }
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReservationDetail extends Model
{
    use HasFactory;

    // Establecer la relacion entre el modelo y la table de maner manual
    protected $table = 'reservations_details';

    // Campos que se pueden asignar en masa
    protected $fillable = [
        'reservation_id',    // ID de la reserva asociada
        'transaction_id',    // ID de la transacción del pago (si aplica)
        'payer_id',          // ID del comprador (si aplica)
        'payer_email',       // Correo electrónico del comprador
        'payment_status',    // Estado del pago (pendiente, pagado, fallido)
        'amount',            // Monto de la transacción
        'response_json',     // Respuesta completa del proveedor de pagos en formato JSON
    ];

    // Relación uno a muchos inversa
    public function reservation(){
        return $this->belongsTo(Reservation::class);
    }
}

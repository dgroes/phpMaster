<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    // Campos rellenables
    protected $fillable = [
        'user_id',
        'consultant_id',
        'reservation_date',
        'start_time',
        'end_time',
        'reservation_status',
        'total_amount',
        'payment_status',
        'cancelation_reason'
    ];

    // C04: Relación uno a muchos inversa
    // Relación uno a muchos inversa
    public function user(){
        return $this->belongsTo(User::class);  //Cliente quien hace la reserva
    }

    // C05: Relación uno a muchos inversa
    // Relación uno a muchos inversa
    public function consultant(){
        return $this->belongsTo(User::class, 'consultant_id'); // Consultor asignado para atender la reserva
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReservationDetail extends Model
{
    use HasFactory;

    // Establecer la relacion entre el modelo y la table de maner manual
    protected $table = 'reservation_details';

    // Campos rellenables
    protected $filliable = [
        'reservation_id',
        'transaction_id',
        'payer_id',
        'payer_email',
        'payment_status',
        'amount',
        'response_json'
    ];

    // Relación uno a muchos inversa
    public function reservation(){
        return $this->belongsTo(Reservation::class);
    }
}

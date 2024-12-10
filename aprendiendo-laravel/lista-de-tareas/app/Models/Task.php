<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Task extends Model
{
    //Definir valores predeterminados a una tabla, con $attributes
    protected $attributes = [
        'completed' => false,
    ];

    //Definir valores que se pueden añadir en masa
    protected $fillable = [
        'title',
        'description',
        'user_id',
        'completed',
    ];
    

    //Establecer las relaciones con otra tabla (Modelo)
    //Con Belongs To especificamos que una Task pertenece a un Usuario
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
